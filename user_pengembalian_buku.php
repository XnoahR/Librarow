<?php 
include 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
} 

$username = $_COOKIE['username'];
$user = query("SELECT * FROM user WHERE username = '$username'")[0];
$riwayatBuku = query("SELECT * FROM peminjaman WHERE id_user='{$user['id']}' AND status_peminjaman ='dipinjam'");
$dataBuku = query("SELECT id_buku FROM peminjaman WHERE id_user='{$user['id']}' AND status_peminjaman ='dipinjam'");

$arrBook = [];
$arrBookCover = [];
$arrBookId = [];
foreach($dataBuku as $daftarBuku){
    $idBuku = $daftarBuku['id_buku'];
    $buku = query("SELECT * FROM buku WHERE id = '$idBuku'")[0];
    $arrBookId [] = $buku['id'];
    $arrBook [] = $buku['nama'];
    $arrBookCover [] = $buku['sampul'];
}

$dataLimitPerPage = 5;
$dataTotal = count($riwayatBuku);
$pageTotal = ceil($dataTotal / $dataLimitPerPage);
$activePage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$dataStart = ($dataLimitPerPage * $activePage) - $dataLimitPerPage;
$daftarRiwayat = query("SELECT * FROM peminjaman WHERE id_user='{$user['id']}' AND status_peminjaman ='dipinjam' LIMIT $dataStart, $dataLimitPerPage");


if(isset($_POST['submit'])){
    if(ReturnBookUser($_POST['id']) > 0){
        echo "<script>
        alert('Permintaan berhasil dikirim!');
        document.location.href = 'user_pengembalian_buku.php';
        </script>";
    }
    else{
        echo "<script>
        alert('ERROR!');
        document.location.href = 'user_pengembalian_buku.php';
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user_page.css">
    <style>
        body {
            background-color: #D0D0D0;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

      
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="user_page.php"><img src="img/logo.png" alt="logo" width="30"> LIBRAROW</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user_page.php" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Home" data-bs-animation="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book_categories.php" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Categories" data-bs-animation="true">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Profile" data-bs-animation="true">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Pengembalian Buku -->
    <h1>Buku yang sedang dipinjam</h1>
    <div class="dbcon">
        <?php $i = 0;?>
        <?php foreach($daftarRiwayat as $bookList) :?>
        <div class="dbbook">
            <div class="dbimg"><img src="img/<?=$arrBookCover[$i]?>" alt=""></div>
            <div class="dbtitle"><?= $arrBook[$i]; ?></div>
            <div class="dbtitle"><form action="" method="post">
                <input type="hidden" name="id" value="<?=$bookList['id_pinjam']?>">
                <button class="btn-sm btn-warning"  name="submit" type="submit" onclick="return confirm('Ingin mengembalikan buku?')">Kembalikan</button>
            </form></div>
        </div>
        <?php $i++?>
        <?php endforeach;?>
        
    </div>

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
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
