<?php 
include 'functions.php';
session_start();
if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
} 
//Ambil semua Data
$pustakawan = query("SELECT * FROM pustakawan");
$book = query("SELECT * FROM buku");
$user = query("SELECT * FROM user");
$peminjaman = query("SELECT * FROM peminjaman");

//Bagian Peminjaman
$notifPeminjaman = query("SELECT * FROM peminjaman WHERE status_peminjaman = 'pending'");
//Ambil data nama user
$idUserPeminjaman = query("SELECT id_user FROM peminjaman WHERE status_peminjaman = 'pending'");
$arrNama = [];
$arrIdUser = [];
foreach($idUserPeminjaman as $idUserList){
    $idUser = $idUserList['id_user'];
    $namaUser = query("SELECT nama FROM user WHERE id ='$idUser'")[0];
    $saveIdUser = query("SELECT * FROM user WHERE id ='$idUser'")[0];
    $arrIdUser[] = $saveIdUser['id'];
    $arrNama[] = $namaUser['nama'];
}
//Ambil data buku
$arrBuku = [];
foreach($notifPeminjaman as $idBukuList){
    $idBuku = $idBukuList['id_buku'];
    $namaBuku = query("SELECT nama FROM buku WHERE id = '$idBuku'")[0];
    $arrBuku[] = $namaBuku['nama'];
}

//Bagian Pengembalian
$notifPengembalian = query("SELECT * FROM peminjaman WHERE status_peminjaman = 'mengembalikan'");
//Ambil data nama user
$idUserPengembalian = query("SELECT id_user FROM peminjaman WHERE status_peminjaman = 'mengembalikan'");
$arrNamaPengembalian = [];
$arrIdUserPengembalian = [];
foreach($idUserPengembalian as $idUserPengembalianList){
    $idUserPb = $idUserPengembalianList['id_user'];
    $namaUserPb =  query("SELECT nama FROM user WHERE id = '$idUserPb'")[0];
    $saveIdUserPb = query("SELECT * FROM user WHERE id ='$idUser'")[0];
    $arrIdUserPengembalian[] = $saveIdUserPb['id'];
    $arrNamaPengembalian[] =  $nameUserPb['nama'];
}
//Ambil data buku
$arrBukuPengembalian = [];
foreach($notifPengembalian as $idBukuListPengembalian){
    $idBukuPb = $idBukuListPengembalian['id_buku'];
    $namaBukuPb = query("SELECT nama FROM buku WHERE id = '$idBukuPb'")[0];
    $arrBukuPengembalian[] = $namaBukuPb['nama'];
}

?>
<!DOCTYPE html>
<html lang="en">    

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow - Admin Notification</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admin_page.css">
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
                        <a class="nav-link" href="admin_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile_pustakawan.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    

    <ul style="list-style: none;">
    <?php $i = 0;?>
    <?php foreach($notifPeminjaman as $notif) :?>
<li><div class="nobar">
    <div class="notext"><a href="informasi_mhs.php?id=<?=$arrIdUser[$i];?>"><?=$arrNama[$i];?></a> ingin meminjam buku <?= $arrBuku[$i]; ?></div>
    <div class="nobtn"><a href="accept_book.php?id=<?=$notif['id_pinjam']?>"><button class="btn btn-success me-2">Accept</button></a>
    <a href="reject_book.php?id=<?=$notif['id_pinjam']?>"><button class="btn btn-danger">Reject</button></a></div>
</div>
<?php $i++;?></li>
<?php endforeach;?>
   
</ul>













    <!-- Notification Section -->
    <!-- <section class="notification-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="notification-card">
                        <h3 class="card-title">Notifikasi Peminjaman Baru</h3>
                        <p class="card-text">Ada permintaan peminjaman baru dari pengguna dengan nama John Doe. Silakan
                            validasi peminjaman untuk buku dengan judul "Test1".</p>
                    </div>
                    <div class="notification-card hidden">
                        <h3 class="card-title">Notifikasi Pengembalian Buku</h3>
                        <p class="card-text">Pengguna dengan nama John Doe ingin mengembalikan buku dengan judul "Test1". Silakan validasi pengembalian buku tersebut.</p>
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
    </script> -->
</body>

</html>
