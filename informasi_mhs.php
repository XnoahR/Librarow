<?php
include 'functions.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location:login.php");
    exit;
}
$id = $_GET['id'];
$mahasiswa = query("SELECT * FROM user WHERE id = '$id'")[0];
$peminjaman = query("SELECT id_buku FROM peminjaman WHERE id_user = '$id' AND status_peminjaman = 'dipinjam'");
$info_buku = array(); // Create an empty array to store the book names

foreach ($peminjaman as $kodebuku) {
    $id_buku = $kodebuku['id_buku'];
    $book = query("SELECT nama FROM buku WHERE id = '$id_buku'")[0];
    $info_buku[] = $book['nama']; // Store the book name in the array
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="css/admin_page.css">
    <style>
body {
    background-color: #D0D0D0;
}

.navbar {
    background-color: #343a40;
}

.profile-card {
    text-align: center;
}

.profile-image {
    width: 200px;
    height: 200px;
    object-fit: cover;
    margin: 0 auto;
    display: block;
}

.profile-name {
    margin-top: 20px;
    font-size: 24px;
    font-weight: bold;
}

.info-card {
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 8px;
}

.info-title {
    margin-bottom: 20px;
    font-size: 28px;
    font-weight: bold;
}

.table {
    background-color: #f8f9fa;
    margin-bottom: 0;
}

.table th {
    background-color: #e9ecef;
}

.book-list {
    padding-left: 20px;
    margin-top: 10px;
    margin-bottom: 0;
    list-style: none;
}

@media (max-width: 576px) {
    .profile-image {
        width: 150px;
        height: 150px;
    }
}

    </style>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="user_page.php">
                <img src="img/logo.png" alt="logo" width="30"> LIBRAROW</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin_page.php" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Home" data-bs-animation="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_logout.php" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Logout" data-bs-animation="true">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-card">
                    <?php if ($mahasiswa['foto'] === NULL) : ?>
                        <img class="rounded-circle profile-image" src="img/orang.png" alt="">
                    <?php else : ?>
                        <img class="rounded-circle profile-image" src="img/<?= $mahasiswa['foto']; ?>" alt="">
                    <?php endif; ?>
                    <h3 class="profile-name"><?= $mahasiswa['nama'] ?></h3>
                </div>
            </div>
            <div class="col-md-8">
                <div class="info-card">
                    <h2 class="info-title">Informasi Mahasiswa</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Nim</th>
                                <td><?= $mahasiswa['nim'] ?></td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td><?= $mahasiswa['username'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $mahasiswa['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Nomor HP</th>
                                <td><?= $mahasiswa['nohp'] ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?= $mahasiswa['status'] ?></td>
                            </tr>
                            <tr>
                                <th>Daftar Buku Dipinjam</th>
                                <td>
                                    <ul class="book-list">
                                        <?php foreach ($info_buku as $daftar_buku) : ?>
                                            <li><?= $daftar_buku ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div><br>
                    <a href="javascript:history.go(-1);" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>