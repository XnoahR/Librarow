<?php 
include 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
} 

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



    <div class="bookshelf">
        <div class="bstitle">NEW RELEASE</div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
    </div>
    <div class="bookshelf">
        <div class="bstitle">MOST VIEWED</div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
        <div class="bookcontainer">
            <div class="bookcenter">
                <img src="img/stevejob.png" width="145" height="200">
            </div>
            <div class="booktitle">Steve Jobs</div>
            <div class="bookcenter"><button class="button1"><a href="borrow_book.php">Borrow</a></button></div>
        </div>
    </div>

    <div class="bookshelf">
        <div class="bstitle">NEW RELEASE!</div>
        <div class="bookcontainer">buku 1</div>
        <div class="bookcontainer">buku 2</div>
        <div class="bookcontainer">buku 3</div>
        <div class="bookcontainer">buku 4</div>
        <div class="bookcontainer">buku 5</div>
    </div>
    <a href="notifikasi_user.php">
        <img src="img/bell.png" class="notification-icon" alt="Notification Bell">
    </a>

</body>

</html>