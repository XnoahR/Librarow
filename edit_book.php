<?php
include 'functions.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
$id = $_GET['id'];
$book = query("SELECT * FROM buku WHERE id = '$id'")[0];

if (isset($_POST["submit"])) {

    if (change($_POST) > 0) {
        echo '
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
            <div id="successToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Success</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Data berhasil diubah.
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var successToast = new bootstrap.Toast(document.getElementById("successToast"));
                successToast.show();
                setTimeout(function() {
                    document.location.href = "data_buku.php";
                }, 3000);
            });
        </script>
        ';
    } else {
        echo '
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
            <div id="warningToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-warning text-dark">
                    <strong class="me-auto">Warning</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Data tetap sama.
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var warningToast = new bootstrap.Toast(document.getElementById("warningToast"));
                warningToast.show();
                setTimeout(function() {
                    document.location.href = "data_buku.php";
                }, 3000);
            });
        </script>
        ';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow - Edit Buku</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin_page.css">
</head>

<body style="background-color: #D0D0D0;">

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="user_page.php">
                <img src="img/logo.png" alt="logo" width="30">LIBRAROW</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_page.php" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Home" data-bs-animation="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile_pustakawan.php" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Profile" data-bs-animation="true">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Form Container -->
    <div class="container mt-4">
        <div class="card" style="margin-bottom: 2em;">
            <div class="card-header">
                <h5 class="card-title">Edit Buku</h5>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?=$book["id"]?>">
                    <input type="hidden" name="sampullama" id="sampullama" value="<?=$book["sampul"]?>">
                    <input type="hidden" name="kategori" id="kategori" value="<?=$book['kategori']?>">
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Judul Buku</strong></label>
                        <input type="text" name="name" id="name" class="form-control" value="<?=$book["nama"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label"><strong>Pengarang</strong></label>
                        <input type="text" name="pengarang" id="pengarang" class="form-control"
                            value="<?=$book["pengarang"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label"><strong>Jumlah Buku</strong></label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control"
                            value="<?=$book["available"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="sampul" class="form-label"><strong>Sampul Buku</strong></label><br>
                        <img src="img/<?=$book["sampul"]?>" width="200" alt="<?=$book['nama']?>"><br>
                        <input type="file" name="sampul" id="sampul" class="form-control-file">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
