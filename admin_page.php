
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


    <!-- Tab Container -->
    <div class="bookshelf">
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/mahasiswa.png" width="145" height="200">
            </div>
            <div class="booktitle">DATA MAHASISWA</div>
            <div class="bookcenter"><button class="button1"><a href="data_mahasiswa.php">KLIK</a> </button></div>    
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/pustakawan.png" width="145" height="200">
            </div>
            <div class="booktitle">PUSTAKAWAN</div>
            <div class="bookcenter"><button class="button1"><a href="data_admin.php">KLIK</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/book.png" width="145" height="200">
            </div>
            <div class="booktitle">DATA BUKU</div>
            <div class="bookcenter"><button class="button1"><a href="data_buku.php">KLIK</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/notifikasi.png" width="145" height="200">
            </div>
            <div class="booktitle">NOTIFIKASI</div>
            <div class="bookcenter">
                <button class="button1">
                    <a href="notifikasi_pustakawan.php" style="color: white;">
                        Klik
                    </a>
                </button>
            </div>
        </div>
    </div>
</body>
</html>