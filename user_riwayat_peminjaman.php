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
    <title>Librarow - Riwayat Peminjaman</title>
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
<!-- Riwayat Peminjaman Section -->
<section class="riwayat-peminjaman-section">
    <div class="container">
        <h2>Riwayat Peminjaman Buku</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data peminjaman -->
                <tr>
                    <td>1</td>
                    <td>Harry Potter and the Philosopher's Stone</td>
                    <td>2023-05-15</td>
                    <td>2023-05-30</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>To Kill a Mockingbird</td>
                    <td>2023-04-20</td>
                    <td>2023-05-05</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>The Great Gatsby</td>
                    <td>2023-03-10</td>
                    <td>2023-03-25</td>
                </tr>
                <!-- End of data peminjaman -->
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
