<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow - User Notification</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user_page.css">
    <style>
        .notification-card {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .show-more-button,
        .show-less-button {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body style="background-color: #D0D0D0;">

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LIBRAROW</a>
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

    <!-- Notification Section -->
    <section class="notification-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="notification-card">
                        <h3 class="card-title">Update Aplikasi</h3>
                        <p class="card-text">Kami telah merilis pembaruan terbaru untuk aplikasi Librarow. Silakan unduh
                            versi terbaru untuk mendapatkan fitur dan perbaikan terkini.</p>
                    </div>
                    <div class="notification-card hidden">
                        <h3 class="card-title">Permintaan Pengembalian</h3>
                        <p class="card-text">Pengembalian telah divalidasi oleh admin, selamat meminjam buku kembali dan semangat mencari ilmu</p>
                    </div>
                    <div class="notification-card hidden">
                        <h3 class="card-title">Pengembalian</h3>
                        <p class="card-text">Pengembalian buku berjudul "Test1" akan divalidasi oleh admin, kembalikan buku terlebih dahulu agar segera divalidasi</p>
                    </div>
                    <div class="notification-card hidden">
                        <h3 class="card-title">Permintaan Peminjaman</h3>
                        <p class="card-text">Validasi berhasil, silahkan pinjam buku yang sesuai dengan kesepakatan dengan mendatangi perpustakaan</p>
                    </div>
                    <div class="notification-card hidden">
                        <h3 class="card-title">Peminjaman</h3>
                        <p class="card-text">Anda telah meminjam buku yang berjudul "Test1", mohon tunggu proses selanjutnya</p>
                    </div>
                    <div class="show-more-button">Show More</div>
                    <div class="show-less-button hidden">Show Less</div>
                </div>
            </div>
        </div>
    </section>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        const showMoreButton = document.querySelector('.show-more-button');
        const showLessButton = document.querySelector('.show-less-button');
        const hiddenCards = document.querySelectorAll('.notification-card.hidden');

        showMoreButton.addEventListener('click', function() {
            hiddenCards.forEach(card => {
                card.classList.remove('hidden');
            });
            showMoreButton.classList.add('hidden');
            showLessButton.classList.remove('hidden');
        });

        showLessButton.addEventListener('click', function() {
            hiddenCards.forEach(card => {
                card.classList.add('hidden');
            });
            showMoreButton.classList.remove('hidden');
            showLessButton.classList.add('hidden');
        });
    </script>
</body>

</html>
