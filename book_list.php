<?php 
 include 'functions.php';
 session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
} 
 $category = $_GET['kategori'];
 $book = query("SELECT * FROM buku WHERE kategori ='$category'");

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
    <link rel="stylesheet" href="css/book_categories.css">
    <style>
        .container {
        margin-top: 50px;
        background-color: #D0D0D0;
        padding: 20px;
        }

        .cattitle {
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 30px;
        }
    </style>
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
                <a class="nav-link" href="user_page.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home" data-bs-animation="true">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="book_categories.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Categories" data-bs-animation="true">Categories</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="user_profile.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile" data-bs-animation="true">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="user_logout.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout" data-bs-animation="true">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="cattitle"><?= $book[0]['kategori'] ?></div>
            <div class="row">
                <?php foreach($book as $bk) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="blshelf">
                        <div class="blimgcon">
                        <img src="img/<?=$bk['sampul']?>" alt="">
                    </div>
                    <div class="bltextcon">
                        <div class="bltitle"><?= $bk['nama'] ?></div>
                        <div class="bltextbox">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="blauthor">Author: <?= $bk['pengarang'] ?></div>
                    </div>
                    <div class="blbuttoncon">
                        <a href="borrow_book.php?id=<?= $bk['id'] ?>" class="btn btn-primary btn-hover">BORROW</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- <div class="blshelf">
        <div class="blimgcon">

            <img src="img/stevejob.png" alt="">
        </div>
        <div class="bltextcon">
            <div class="bltitle">TITLE</div>
            <div class="bltextbox">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            </div>
            <div class="blauthor">RAY</div>
            <div class="blbuttoncon"><button class="blbutton"><a href="borrow_book.php">BORROW</a></button></div>
        </div>
    </div>
     -->


    </div>
    <a href="notifikasi_user.php">
        <img src="img/bell.png" class="notification-icon" alt="Notification Bell">
    </a>


</body>

</html>

