<?php
include 'functions.php';
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
        <div class="datatitle">Data Admin</div>
        <div class="datasearch">Search
            <input type="text" name="search" id="search">
        </div>

        <table border="1px solid" width="85%" style="border-collapse:collapse;margin:auto;">
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>


            <?php
            $i = 1;
            ?>
            <?php foreach($pustakawan as $lib) : ?>

            <tr>
                <td><?=$i;?></td>
                <td><?=$lib["foto"]?></td>
                <td><?=$lib["nama"]?></td>
                <td><?=$lib["username"]?></td>
                <td><?=$lib["email"]?></td>
                <td><?=$lib["password"]?></td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
        </table>
    </div>
</body>

</html>