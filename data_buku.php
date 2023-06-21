<?php
include 'functions.php';
session_start();
if (!isset($_SESSION["admin"])) {
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
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="background-color: #D0EFFF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">LIBRAROW</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_logout.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout" data-bs-animation="true">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="datacontainer">
            <div class="datatitle">Data Buku</div>
            <div class="datasearch">
                <form action="" method="post" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="keyword" id="keyword" size="25" autocomplete="off" placeholder="Cari Buku" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" name="cari">Cari</button>

                        </div>
                    </div>
                </form>
            </div>
            <a href="add_book.php" class="btn btn-primary">Tambah Buku</a>
            <table class="table table-bordered table-sm mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sampul</th>
                        <th>Judul</th>
                        <th>Ketersediaan</th>
                        <th>Pengarang</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $book) : ?>
                        <tr>
                            <td class="p-1"><?= $i; ?></td>
                            <td class="p-1"><img src="img/<?= $book["sampul"] ?>" alt="<?= $book["nama"] ?>" width="50"></td>
                            <td class="p-1"><?= $book["nama"] ?></td>
                            <td class="p-1"><?= $book["available"] ?></td>
                            <td class="p-1"><?= $book["pengarang"] ?></td>
                            <td class="p-1"><?= $book["kategori"] ?></td>
                            <td class="p-1">
                                <a href="edit_book.php?id=<?= $book['id'] ?>" class="btn btn-sm btn-primary">edit</a>
                                <a href="delete_book.php?id=<?= $book['id'] ?>" onclick="return confirm('Delete Item?');" class="btn btn-sm btn-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>




        </div>
    </div>
    <br><br><br>
    <nav aria-label="Page navigation example" style="padding-bottom: 20px;">
        <ul class="pagination justify-content-center">
            <?php if ($activePage > 1) : ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $activePage - 1; ?>">
                        <</a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $pageTotal; $i++) : ?>
                <li class="page-item <?= ($i == $activePage) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i ?></a></li>
            <?php endfor; ?>
            <?php if ($activePage < $pageTotal) : ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $activePage + 1; ?>">></a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>