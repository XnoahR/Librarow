<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user_page.css">
</head>

<body style="background-color: #D0D0D0;">

    <!--Navbar-->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid ">
            <a class="navbar-brand " href="#">LIBRAROW</a>
            <div class="nav navbar-custom" id="navbarSupportedContent" style="color: #D0EFFF !important;">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book_categories.php">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Card berisi Profil, History Peminjaman, dan Status -->
    <div class="pucontainer">
        <div class="pupict">
            <img src="img/orang.png" alt="">
        </div>
        <div class="puinfocon">
            <div class="puinfo">
                <div class="profildiv">
                    <p>your status:</p>
                    <p>Available</p>
                </div>
                <div class="profildiv centering">
                    <button style="margin-top:15%;"><a href="user_riwayat_peminjaman.php">History</a></button>
                </div>
                <div class="profildiv centering">
                    <p>approved</p>
                    <p>x</p>
                </div>
                <div class="profildiv centering">
                    <p>pending</p>
                    <p>x</p>
                </div>
            </div>
            <div class="profildiv centering">
                    <button style="margin-top:15%;"><a href="user_riwayat_peminjaman.php">Logout</a></button>
            </div>
        </div>
    </div>

    <!-- Content Writer -->
    <div class="pucontainer">
    <div class="pueditcon">
            <a href="user_edit_profile.php">Edit Profile</a>
            </div>
        <!-- Nama -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Name</div>
                <div class="puins">None</div>
            </div>
        </div>
        <!-- NIM -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">NIM</div>
                <div class="puins">None</div>
            </div>
        </div>
        <!-- Email -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Email</div>
                <div class="puins">None</div>
            </div>
        </div>
        <!-- Username -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Username</div>
                <div class="puins">None</div>
            </div>
        </div>
        <!-- Password -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Password</div>
                <div class="puins">None</div>
            </div>
        </div>
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Buku yang sedang dipinjam</div>
                <div class="puins">None</div>
            </div>
            <div class="pueditcon">
            <a href="user_pengembalian_buku.php">Return Book</a>
            </div>
        </div>
        
    </div>
    <a href="notifikasi_user.php">
        <img src="img/bell.png" class="notification-icon" alt="Notification Bell">
    </a>
</body>

</html>