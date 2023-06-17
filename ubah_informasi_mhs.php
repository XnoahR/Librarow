<?php
include 'functions.php';
session_start();
if(!isset($_SESSION["admin"])){
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

   
</body>

</html>