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
<!-- Head -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user_page.css">
    <link rel="stylesheet" href="css/book_categories.css">
</head>

<!-- Body -->
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

    <!-- Kategori Container -->
    <div class="container-fluid catbox">
      <div class="cattitle">CATEGORIES</div>
      
      <!-- Kategori-Biograph -->
      <div class="catshelf">
            <div class="bookframe">
                <img src="img/stevejob.png" alt="">
            </div>
            <div class="booktitle">Biograph</div>
                <div>
                    <a href="book_list.php?kategori=Biograph" class="btn btn-primary btn-pop-up">View More</a>
                </div>
             </div>

        <!-- Kategori-Horror -->
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/horror.jpg" alt="">
            </div>
            <div class="booktitle">Horror</div>
                <div>
                    <a href="book_list.php?kategori=Horror" class="btn btn-primary btn-pop-up">View More</a>
                </div>
            </div>
        
        <!-- Kategori-Drama -->
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/drama.jpg" alt="">
            </div>
            <div class="booktitle">Drama</div>
                <div>
                    <a href="book_list.php?kategori=Drama" class="btn btn-primary btn-pop-up">View More</a>
                </div>
            </div>

        <!-- Kategori-Sociology -->
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/socio.jpg" alt="">
            </div>
            <div class="booktitle">Sociology</div>
                <div>
                    <a href="book_list.php?kategori=Sociology" class="btn btn-primary btn-pop-up">View More</a>
                </div>
            </div>

        <!-- Kategori-Romance -->
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/romance.jpg" alt="">
            </div>
            <div class="booktitle">Romance</div>
                <div>
                    <a href="book_list.php?kategori=Romance" class="btn btn-primary btn-pop-up">View More</a>
                </div>
            </div>

        <!-- Kategori-Comic -->
        <div class="catshelf">
            <div class="bookframe">
                <img src="img/comic.jpg" alt="">
            </div>
            <div class="booktitle">Comic</div>
                <div>
                    <a href="book_list.php?kategori=Comic" class="btn btn-primary btn-pop-up">View More</a>
                </div>
            </div>
        </div>

    <!-- Notifikasi -->
    <a href="notifikasi_user.php">
        <img src="img/bell.png" class="notification-icon" alt="Notification Bell">
    </a>

    <!-- Footer -->
    <footer class="footer bg-dark text-light" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
            <!-- Footer-About -->
            <div class="col-lg-4" style="margin-top: 20px;">
                <h5>About Us</h5>
                <p>Our library is dedicated to providing a seamless book borrowing experience for our users. With our library management system, you can easily explore our extensive collection of books, place holds, and check out your favorite titles. Our user-friendly interface and efficient processes ensure a hassle-free borrowing process, allowing you to enjoy the pleasure of reading.</p>
            </div>

            <!-- Footer-Contact Us -->
            <div class="col-lg-4" style="margin-top: 20px;">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                <li>Email: librarowweb.gmail.com</li>
                <li>Phone: +6289655847696</li>
                <li>Address: Kp.Gendingan No.44 Surakarta</li>
                </ul>
            </div>

            <!-- Footer-Follow Us -->
            <div class="col-lg-4" style="margin-top: 20px;">
                <h5>Follow Us</h5>
                <ul class="list-inline">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            </div>

            <!-- Footer-Copyright -->
            <div class="row">
            <div class="col-lg-12 text-center">
                <p>&copy; 2023 Librarow. All Rights Reserved.</p>
            </div>
            </div>
        </div>
    </footer>
</body>

</html>