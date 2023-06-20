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
        <div class="container-fluid">
            <a class="navbar-brand" href="user_page.php">
                <img src="img/logo.png" alt="logo" width="30">LIBRAROW</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" href="admin_page.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home" data-bs-animation="true">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="profile_pustakawan.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile" data-bs-animation="true">Profile</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- Tab Container -->
    <div class="bookshelf">
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/mahasiswa.png" width="145" height="200">
            </div>
            <div class="booktitle">DATA MAHASISWA</div>
            <div class="bookcenter"><a href="data_mahasiswa.php"><button class="button1">KLIK</button></a></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/pustakawan.png" width="145" height="200">
            </div>
            <div class="booktitle">PUSTAKAWAN</div>
            <div class="bookcenter"><a href="data_admin.php"><button class="button1">KLIK</button></a></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/book.png" width="145" height="200">
            </div>
            <div class="booktitle">DATA BUKU</div>
            <div class="bookcenter"><a href="data_buku.php"><button class="button1">KLIK</button></a></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/notifikasi.png" width="145" height="200">
            </div>
            <div class="booktitle">NOTIFIKASI</div>
            <div class="bookcenter">
                <a href="notifikasi_pustakawan.php"><button class="button1">KLIK</button></a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-1">
        <div class="container">
            <p>&copy; 2023 Librarow. All rights reserved.</p>
        </div>
    </footer>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>