<?php
include 'functions.php';
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Cek apakah modal sudah ditampilkan sebelumnya
if (!isset($_SESSION['modalShown'])) {
    // Setel session bahwa modal sudah ditampilkan
    $_SESSION['modalShown'] = true;

    // Tampilkan modal
    echo '
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Librarow</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Welcome to our website. Please feel free to check out the books we have available. If you like it, you can borrow it. We will be happy to serve you, have a nice day.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById("notificationModal"));
            myModal.show();
        });
    </script>
    ';
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
    <div id="running-text-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <p class="running-text"><strong>Welcome To Our Website!</strong></p>
            </div>
        </div>
    </div>

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

    <footer class="footer bg-dark text-light" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
            <div class="col-lg-4" style="margin-top: 20px;">
                <h5>About Us</h5>
                <p>Our library is dedicated to providing a seamless book borrowing experience for our users. With our library management system, you can easily explore our extensive collection of books, place holds, and check out your favorite titles. Our user-friendly interface and efficient processes ensure a hassle-free borrowing process, allowing you to enjoy the pleasure of reading.</p>
            </div>
            <div class="col-lg-4" style="margin-top: 20px;">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                <li>Email: librarowweb.gmail.com</li>
                <li>Phone: +6289655847696</li>
                <li>Address: Kp.Gendingan No.44 Surakarta</li>
                </ul>
            </div>
            <div class="col-lg-4" style="margin-top: 20px;">
                <h5>Follow Us</h5>
                <ul class="list-inline">
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-12 text-center">
                <p>&copy; 2023 Librarow. All Rights Reserved.</p>
            </div>
            </div>
        </div>
    </footer>


<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>