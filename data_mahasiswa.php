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
</head>

<body style="background-color: #D0D0D0;">
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">LIBRAROW</a>
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

    <div class="datacontainer">
        <div class="datatitle">Data Mahasiswa</div>
        <div class="datasearch">
            <form action="" method="post">
                <input type="text" name="keyword" id="keyword" size="25" autocomplete="off" placeholder="Cari Mahasiswa">
                <button class="btn-sm btn-outline-success" type="submit" name="cari">Cari</button>
            </form>
        </div>

        <table border="1px solid" width="95%" style="border-collapse: collapse; margin: auto;">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $mhs) : ?>

                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $mhs["nama"] ?></td>
                    <td><?= $mhs["nim"] ?></td>
                    <td><?= $mhs["email"] ?></td>
                    <td>
                        <form action="" method="POST">
                            <select name="status">
                                <option value="aktif" <?= $mhs["status"] === "aktif" ? "selected" : "" ?>>Aktif</option>
                                <option value="suspend" <?= $mhs["status"] === "suspend" ? "selected" : "" ?>>Suspend</option>
                                <option value="inactive" <?= $mhs["status"] === "inactive" ? "selected" : "" ?>>Inactive</option>
                            </select>
                            <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
                            <button class="btn-sm btn-warning" type="submit" name="ubah">Ubah</button>
                        </form>
                    </td>
                    <td>
                        <a href="informasi_mhs.php?id=<?= $mhs['id'] ?>"><button class="btn-sm btn-primary">info</button>
                        </a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($activePage > 1) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $activePage -= 1; ?>"><</a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $pageTotal; $i++) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i ?></a></li>
                <?php endfor; ?>
                <?php if ($activePage < $pageTotal) : ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $activePage += 1; ?>">></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

</body>

</html>