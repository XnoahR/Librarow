<?php 
include 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
} 

$username = $_COOKIE['username'];
$user = query("SELECT * FROM user WHERE username = '$username'")[0];
$riwayatBuku = query("SELECT * FROM peminjaman WHERE id_user='{$user['id']}' AND status_peminjaman ='dikembalikan'");
$dataBuku = query("SELECT id_buku FROM peminjaman WHERE id_user='{$user['id']}' AND status_peminjaman ='dikembalikan'");

$arrBook = [];
foreach($dataBuku as $daftarBuku){
    $idBuku = $daftarBuku['id_buku'];
    $namaBuku = query("SELECT nama FROM buku WHERE id = '$idBuku'")[0];
    $arrBook [] = $namaBuku['nama'];
}

$dataLimitPerPage = 10;
$dataTotal = count($riwayatBuku);
$pageTotal = ceil($dataTotal / $dataLimitPerPage);
$activePage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$dataStart = ($dataLimitPerPage * $activePage) - $dataLimitPerPage;
$daftarRiwayat = query("SELECT * FROM peminjaman WHERE id_user='{$user['id']}' AND status_peminjaman ='dikembalikan' LIMIT $dataStart, $dataLimitPerPage");




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow - Riwayat Peminjaman</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user_page.css">
</head>

<body style="background-color: #D0D0D0;">

    <!--Navbar-->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="user_page.php"><img src="img/logo.png" alt="logo" width="30"> LIBRAROW</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" href="user_page.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home" data-bs-animation="true">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="book_categories.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Categories" data-bs-animation="true">Categories</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="user_profile.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile" data-bs-animation="true">Profile</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
<!-- Riwayat Peminjaman Section -->
<section class="riwayat-peminjaman-section">
    <div class="container">
        <h2>Riwayat Peminjaman Buku</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>
        <?php $i = 1; $index = 0; ?>
        <!-- Data peminjaman -->
        <?php foreach($daftarRiwayat as $riwayatList) :?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $arrBook[$index] ?></td>
            <td><?= $riwayatList['tgl_pinjam'] ?></td>
            <td><?= $riwayatList['tgl_kembalian'] ?></td>
        </tr>
        <?php $i++; $index++; ?>
        <?php endforeach;?>
        <!-- End of data peminjaman -->
            </tbody>
        </table>

        <!-- Pagination -->
        
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($activePage > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $activePage - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $pageTotal; $i++) : ?>
                    <li class="page-item <?php if ($i == $activePage) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($activePage < $pageTotal) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $activePage + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</section>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
