<?php 
include 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
} 
$Username = $_COOKIE['username'];
$user = query("SELECT * FROM user WHERE username = '$Username'")[0];
$userBook = query("SELECT * FROM peminjaman WHERE id_user ='{$user['id']}' AND status_peminjaman = 'dipinjam'");
$userPending = query("SELECT * FROM peminjaman WHERE id_user ='{$user['id']}' AND status_peminjaman = 'pending'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user_page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-qd7bZRcleVms1Zbjn7BA1P5O8XPBZbE0+/FzYKle5dA6ixwlgUudxtUg6Abpgy9wI/BrkHYsM6VCEud/0oWsyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    .card.pupict {
        background-color: transparent;
        border: none;
    }
</style>
</head>

<body style="background-color: #D0D0D0;">
    <!--Navbar-->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="user_page.php"><img src="img/logo.png" alt="logo" width="30"> LIBRAROW</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link" href="user_page.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home" data-bs-animation="true">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="book_categories.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Categories" data-bs-animation="true">Categories</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="user_profile.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile" data-bs-animation="true">Profile</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>


    <!-- Card berisi Profil, History Peminjaman, dan Status -->
    <div class="pucontainer">
    <div class="card pupict">
        <img src="img/<?=$user['foto']?>" class="card-img-top rounded-circle shadow shadow-info shadow-lg border" alt="">
    </div>
    <div class="card puinfocon" style="border: 0;">
        <div class="card-body puinfo">
            <div class="card-text profildiv">
            <p class="card-title h5 fw-bold">Your Status:</p>
                <p>Available</p>
            </div>
            <div class="card-text profildiv centering">
                <a href="user_riwayat_peminjaman.php" class="btn btn-primary">History</a>
            </div>
            <div class="card-text profildiv centering">
            <p class="card-title h5 fw-bold">Approved:</p>
                <!-- Not accepted -->
                <span class="badge bg-danger rounded-pill"><?= count($userPending) ?></span>

                <!-- Accepted -->
                <!-- <span class="bi bi-check-circle-fill text-success"></span> -->
            </div>
            <div class="card-text profildiv centering">
            <p class="card-title h5 fw-bold">Pending:</p>
                <!-- Not accepted -->
                <!-- <span class="badge bg-danger rounded-pill">x</span> -->
            
                <!-- Accepted -->
                <span class="badge bg-success rounded-pill"><?= count($userBook); ?></span>
            </div>
        </div>
        
    </div>
</div>


    <!-- Content Writer -->
    <div class="pucontainer">
    <div class="pueditcon">
        <a href="user_edit_profile.php?id=<?=$user['id']?>">
            <i class="bi bi-pencil"></i> Edit Profile
        </a>
    </div>
        <!-- Nama -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Name</div>
                <div class="puins"><?= $user['nama'] ?></div>
            </div>
        </div>
        <!-- NIM -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">NIM</div>
                <div class="puins"><?= $user['nim'] ?></div>
            </div>
        </div>
        <!-- Email -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Email</div>
                <div class="puins"><?= $user['email'] ?></div>
            </div>
        </div>
        <!-- NoHP -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Nomor HP</div>
                <div class="puins"><?= $user['nohp'] ?></div>
            </div>
        </div>
        <!-- Username -->
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Username</div>
                <div class="puins"><?= $user['username'] ?></div>
            </div>
        </div>
        <!-- Password -->
        
        <div class="pubar">
            <div class="putextcon">
                <div class="putitle">Buku yang sedang dipinjam</div>
                <div class="puins"><?= count($userBook); ?></div>
            </div>
            <div class="pueditcon d-flex justify-content-end align-items-center">
                <a href="user_pengembalian_buku.php?id=<?=$user['id']?>" class="btn btn-primary me-3">Info</a>
            </div>
        </div>
        <div class="card-text profildiv ms-2 mt-3">
            <a href="user_logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
    </div>
    
    <a href="notifikasi_user.php">
        <img src="img/bell.png" class="notification-icon" alt="Notification Bell">
    </a>
    
</body>

</html>