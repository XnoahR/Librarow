<?php 
include 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
} 
$bookcat = query("SELECT * FROM buku");

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
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid catbox">
      <div class="cattitle">CATEGORIES</div>
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/stevejob.png" alt="">
            </div>
            <div class="booktitle">Biograph</div>
            <div><button><a href="book_list.php?kategori=Biograph">View More</a></button></div>
        </div>
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/stevejob.png" alt="">
            </div>
            <div class="booktitle">Horror</div>
            <div><button><a href="book_list.php?kategori=Horror">View More</a></button></div>
        </div>
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/stevejob.png" alt="">
            </div>
            <div class="booktitle">Drama</div>
            <div><button><a href="book_list.php?kategori=Drama">View More</a></button></div>
        </div>
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/stevejob.png" alt="">
            </div>
            <div class="booktitle">Sociology</div>
            <div><button><a href="book_list.php?kategori=Sociology">View More</a></button></div>
        </div>
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/stevejob.png" alt="">
            </div>
            <div class="booktitle">Romance</div>
            <div><button><a href="book_list.php?kategori=Romance">View More</a></button></div>
        </div>
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/stevejob.png" alt="">
            </div>
            <div class="booktitle">Comic</div>
            <div><button><a href="book_list.php?kategori=Comic">View More</a></button></div>
        </div>
        
        
    </div>
    <a href="notifikasi_user.php">
        <img src="img/bell.png" class="notification-icon" alt="Notification Bell">
    </a>


</body>

</html>