<?php
include 'functions.php';
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
$username = $_COOKIE['username'];

//Ambil semua Data
$pustakawan = query("SELECT * FROM pustakawan");
$book = query("SELECT * FROM buku");
$user = query("SELECT * FROM user WHERE username = '$username'")[0];
$peminjaman = query("SELECT * FROM peminjaman");

//Bagian Peminjaman Pending
$notifPeminjamanPending = query("SELECT * FROM peminjaman WHERE status_peminjaman = 'pending' AND id_user = '{$user['id']}'");
//Ambil data nama user

$idUserPeminjaman = query("SELECT id_user FROM peminjaman WHERE status_peminjaman = 'pending'");
// $arrNama = [];
// $arrIdUser = [];
// foreach($idUserPeminjaman as $idUserList){
//     $idUser = $idUserList['id_user'];
//     $namaUser = query("SELECT nama FROM user WHERE id ='$idUser'")[0];
//     $saveIdUser = query("SELECT * FROM user WHERE id ='$idUser'")[0];
//     $arrIdUser[] = $saveIdUser['id'];
//     $arrNama[] = $namaUser['nama'];
// }

//Ambil data buku
$arrBukuPending = [];
foreach ($notifPeminjamanPending as $idBukuList) {
    $idBuku = $idBukuList['id_buku'];
    $namaBuku = query("SELECT nama FROM buku WHERE id = '$idBuku'")[0];
    $arrBukuPending[] = $namaBuku['nama'];
}

//Bagian Peminjaman Diterima
$notifPeminjamanDiterima = query("SELECT * FROM peminjaman WHERE status_peminjaman = 'dipinjam' AND id_user = '{$user['id']}'");
$arrBukuDiterima = [];
foreach ($notifPeminjamanDiterima as $idBukuList) {
    $idBukuDiterima = $idBukuList['id_buku'];
    $namaBukuDiterima = query("SELECT nama FROM buku WHERE id = '$idBukuDiterima'")[0];
    $arrBukuDiterima[] = $namaBukuDiterima['nama'];
}
//Bagian peminjaman Ditolak
$notifPeminjamanDitolak = query("SELECT * FROM peminjaman WHERE status_peminjaman = 'ditolak' AND id_user = '{$user['id']}'");
$arrBukuDitolak = [];
foreach ($notifPeminjamanDitolak as $idBukuList) {
    $idBukuDitolak = $idBukuList['id_buku'];
    $namaBukuDitolak = query("SELECT nama FROM buku WHERE id = '$idBukuDitolak'")[0];
    $arrBukuDitolak[] = $namaBukuDitolak['nama'];
}
//Bagian Permintaan Pengembalian
$notifPengembalianMengembalikan = query("SELECT * FROM peminjaman WHERE status_peminjaman = 'mengembalikan' AND id_user = '{$user['id']}'");
$arrBukuMengembalikan = [];
foreach ($notifPengembalianMengembalikan as $idBukuList) {
    $idBukuMengembalikan = $idBukuList['id_buku'];
    $namaBukuMengembalikan = query("SELECT nama FROM buku WHERE id = '$idBukuMengembalikan'")[0];
    $arrBukuMengembalikan[] = $namaBukuMengembalikan['nama'];
}
//Bagian Pengembalian Diterima
$notifPengembalianDiterima = query("SELECT * FROM peminjaman WHERE status_peminjaman = 'dikembalikan' AND id_user = '{$user['id']}'");
$arrBukuDikembalikan = [];
foreach ($notifPengembalianDiterima as $idBukuList) {
    $idBukuDikembalikan = $idBukuList['id_buku'];
    $namaBukuDikembalikan = query("SELECT nama FROM buku WHERE id = '$idBukuDikembalikan'")[0];
    $arrBukuDikembalikan[] = $namaBukuDikembalikan['nama'];
}
//Bagian Pengembalian Ditolak
$notifPengembalianDireject = query("SELECT * FROM peminjaman WHERE status_peminjaman = 'rejected' AND id_user = '{$user['id']}'");
$arrBukuDireject = [];
foreach ($notifPengembalianDireject as $idBukuList) {
    $idBukuDireject = $idBukuList['id_buku'];
    $namaBukuDireject = query("SELECT nama FROM buku WHERE id = '$idBukuDireject'")[0];
    $arrBukuDireject[] = $namaBukuDireject['nama'];
}
// var_dump($arrBukuDiterima);die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow - User Notification</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user_page.css">
    <!-- <style>
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
    </style> -->
</head>

<body style="background-color: #D0D0D0;">

    <!-- Navbar -->
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
            </ul>
            </div>
        </div>
    </nav>

    <!-- Notification Section -->
    <?php $i = 0; ?>
    <?php $j = 0; ?>
    <?php $k = 0; ?>
    <?php $l = 0; ?>
    <?php $m = 0; ?>
    <?php $n = 0; ?>
    <ul style="list-style: none;">
        <?php foreach ($notifPeminjamanPending as $notif) : ?>
            <li>
                <div class="nobarpending">
                    <div class="notext">Permintaan peminjaman buku <?= $arrBukuPending[$i]; ?> sedang diproses oleh admin.</div>
                </div>
                <?php $i++; ?>
            </li>
        <?php endforeach; ?>

        <?php foreach ($notifPeminjamanDiterima as $notif) : ?>
            <li>
                <div class="nobarditerima">
                    <div class="notext">Permintaan peminjaman buku <?= $arrBukuDiterima[$j]; ?> telah diterima oleh admin.</div>
                </div>
                <?php $j++; ?>
            </li>
        <?php endforeach; ?>

        <?php foreach ($notifPeminjamanDitolak as $notif) : ?>
            <li>
                <div class="nobarditolak">
                    <div class="notext">Permintaan peminjaman buku <?= $arrBukuDitolak[$k]; ?> ditolak oleh admin.</div>
                </div>
                
                <?php $k++; ?>
            </li>
        <?php endforeach; ?>

        <?php foreach ($notifPengembalianMengembalikan as $notif) : ?>
            <li>
                <div class="nobarpending">
                    <div class="notext">Permintaan pengembalian buku <?= $arrBukuMengembalikan[$l]; ?> sedang diproses oleh admin.</div>
                </div>
                <?php $l++; ?>
            </li>
        <?php endforeach; ?>

        <?php foreach ($notifPengembalianDiterima as $notif) : ?>
            <li>
                <div class="nobarditerima">
                    <div class="notext">Permintaan pengembalian buku <?= $arrBukuDikembalikan[$m]; ?> telah diterima oleh admin.</div>
                </div>
                <?php $m++; ?>
            </li>
        <?php endforeach; ?>

        <?php foreach ($notifPengembalianDireject as $notif) : ?>
            <li>
                <div class="nobarditolak">
                    <div class="notext">Permintaan pengembalian buku<?= $arrBukuDireject[$n]; ?> ditolak oleh admin.</div>
                    <div class="nobtn"><a href="return_book.php?id=<?=$notif['id_pinjam']?>" onclick="return confirm('request kembalikan ulang?')"><button class="btn btn-info">Coba lagi</button></a></div>
                </div>
                <?php $n++; ?>
            </li>
        <?php endforeach; ?>

    </ul>

</body>

</html>


    <!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
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
    </script> -->