<?php
include 'functions.php';
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
$mahasiswa = query("SELECT * FROM user");

// Handle form submission
if (isset($_POST['ubah'])) {
    if (ChangeStatus($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah');
        </script>";
    } else {
        echo "<script>
        alert('status sama/belum diubah');
        </script>";
    }
}
// if (isset($_POST['cari'])) {

//     $mahasiswa = SearchMhs($keyword);
// }

$dataLimitPerPage = 10;
$dataTotal = count($mahasiswa);
$pageTotal = ceil($dataTotal / $dataLimitPerPage);
$activePage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$dataStart = ($dataLimitPerPage * $activePage) - $dataLimitPerPage;
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $mahasiswa = query("SELECT * FROM user WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' LIMIT $dataStart, $dataLimitPerPage");
} else {
    $mahasiswa = query("SELECT * FROM user LIMIT $dataStart, $dataLimitPerPage");
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
    <link rel="stylesheet" href="css/admin_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-hhidC2LGdUL/tQM0TuUuQgquInrEACDHczp1VM4K3yrQbPqL6CF+K2DfV+PCc1oxRIMeXJjmUpjwGRqDncDtKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <a class="nav-link" href="admin_page.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home" data-bs-animation="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile_pustakawan.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profile" data-bs-animation="true">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Search Feature -->
    <div class="datacontainer">
        <div class="datatitle">Data Mahasiswa</div>
        <div class="datasearch">
            <form action="" method="post" class="form-inline">
                <input type="text" name="keyword" id="keyword" class="form-control mr-sm-2" size="25" autocomplete="off" placeholder="Cari Mahasiswa">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari">Cari</button>
            </form>
        </div>
        <br><br>
        <table class="table table-bordered" style="width: 95%; margin: auto;">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $mhs["nama"] ?></td>
                        <td><?= $mhs["nim"] ?></td>
                        <td><?= $mhs["email"] ?></td>
                        <td>
                            <form action="" method="POST" class="d-flex">
                            <div class="input-group">
                            <select name="status" class="form-control select-icon">
                                <option value="aktif" <?= $mhs["status"] === "aktif" ? "selected" : "" ?>>Aktif</option>
                                <option value="suspend" <?= $mhs["status"] === "suspend" ? "selected" : "" ?>>Suspend</option>
                                <option value="inactive" <?= $mhs["status"] === "inactive" ? "selected" : "" ?>>Inactive</option>
                            </select>
                                <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
                                <button class="btn btn-warning btn-sm animated-button" type="submit" name="ubah">Ubah</button>
                            </form>

                        </td>
                        <td>
                        <a href="informasi_mhs.php?id=<?= $mhs['id'] ?>" class="btn btn-primary btn-sm custom-info-button">
                            <i class="fas fa-info-circle mr-1"></i> Info
                        </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>


        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($activePage > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $activePage - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $pageTotal; $i++) : ?>
                    <li class="page-item <?php if ($i == $activePage) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($activePage < $pageTotal) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $activePage + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

</body>

</html>