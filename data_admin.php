<?php
include 'functions.php';
session_start();
if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
} 
$pustakawan = query("SELECT * FROM pustakawan");
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
                        <a class="nav-link" href="profile_pustakawan.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Data Admin
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Search</span>
                            <input type="text" class="form-control" name="search" id="search">
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pustakawan as $lib) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $lib["foto"] ?></td>
                                        <td><?= $lib["nama"] ?></td>
                                        <td><?= $lib["username"] ?></td>
                                        <td><?= $lib["email"] ?></td>
                                        <td><?= $lib["password"] ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
