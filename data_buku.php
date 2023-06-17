<?php
include 'functions.php';
session_start();
if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
} 
$buku = query("SELECT * FROM buku");

$dataLimitPerPage = 5;
$dataTotal = count($buku);
$pageTotal = ceil($dataTotal / $dataLimitPerPage);
$activePage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$dataStart = ($dataLimitPerPage * $activePage) - $dataLimitPerPage;
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $buku = query("SELECT * FROM buku WHERE nama LIKE '%$keyword%' LIMIT $dataStart, $dataLimitPerPage");
} else {
    $buku = query("SELECT * FROM buku LIMIT $dataStart, $dataLimitPerPage");
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
    <link rel="stylesheet" href="css/admin_page.css">
</head>

<body style="background-color: #D0D0D0;">
    <!--Navbar-->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid ">
            <a class="navbar-brand " href="login.php">LIBRAROW</a>
            <div class="nav navbar-custom" id="navbarSupportedContent" style="color: #D0EFFF !important;">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile_pustakawan.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="datacontainer">
        <div class="datatitle">Data Buku</div>
        <div class="datasearch">
        <form action="" method="post">
                <input type="text" name="keyword" id="keyword" size="25" autocomplete="off" placeholder="Cari Buku">
                <button class="btn-sm btn-outline-success" type="submit" name="cari">Cari</button>
            </form>
        </div>
        <a href="add_book.php">Tambah Buku</a>
        <table border="1px solid" width="95%" style="border-collapse:collapse;margin:auto;">
            <th>No</th>
            <th>Sampul</th>
            <th>Judul</th>
            <th>Ketersediaan</th>
            <th>Pengarang</th>
            <th>Kategori</th>
            <th>Aksi</th>

            <?php
            $i = 1;
            ?>
            <?php foreach($buku as $book) : ?>

            <tr>
                <td><?=$i;?></td>
                <td><img src="img/<?=$book["sampul"]?>" alt="<?=$book["nama"]?>"width="50"></td>
                <td><?=$book["nama"]?></td>
                <td><?=$book["available"]?></td>
                
                <td><?=$book["pengarang"]?></td>
                <td><?=$book["kategori"]?></td>
                <td>
                    <a href="edit_book.php?id=<?=$book['id']?>">edit</a> |
                    <a href="delete_book.php?id=<?=$book['id']?>"onclick="return confirm('Delete Item?');">delete</a>
                </td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($activePage > 1) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $activePage -= 1; ?>"><</a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $pageTotal; $i++) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i ?></a></li>
                <?php endfor; ?>
                <?php if ($activePage < $pageTotal) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $activePage += 1; ?>">></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</body>

</html>