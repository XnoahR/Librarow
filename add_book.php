<?php
include 'functions.php';

if (isset($_POST["submit"])) {

    if (add($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan');
        document.location.href = 'data_buku.php';
        </script>";
    } else {
        echo "Data error";
    }
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

    <!--Navbar-->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid ">
            <a class="navbar-brand " href="login.php">LIBRAROW</a>
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


    <!-- Tab Container -->
    <div class="addbookbox">
        <div class="insidebookbox">
            <form action="" method="post" enctype="multipart/form-data">
                <ul>
                    <li>
                        <label for="name">Judul Buku: </label>
                        <input type="text" name="name" id="name">
                    </li>
                    <li>
                        <label for="pengarang">Pengarang: </label>
                        <input type="text" name="pengarang" id="pengarang">
                    </li>
                    <li>
                        <label for="jumlah">Jumlah Buku: </label>
                        <input type="number" name="jumlah" id="jumlah">
                    </li>
                    <li>
                        <label for="sampul">Sampul Buku: </label>
                        <input type="file" name="sampul" id="sampul">
                    </li>

                    <label for="kategori">Kategori Buku:</label>
                    <li>
                        <input type="radio" name="kategori" id="Horror" value="Horror">
                        <label for="kategori" class="ilbl">Horor</label>
                        <input type="radio" name="kategori" id="Drama" value="Drama">
                        <label for="kategori" class="ilbl">Drama</label>
                        <input type="radio" name="kategori" id="Biograph" value="Biograph">
                        <label for="kategori" class="ilbl">Biograph</label>
                        <input type="radio" name="kategori" id="Sociology" value="Sociology">
                        <label for="kategori" class="ilbl">Sociology</label>
                    </li>
                    <li>
                        <input type="radio" name="kategori" id="Romance" value="Romance">
                        <label for="kategori" class="ilbl">Romance</label>
                        <input type="radio" name="kategori" id="Comic" value="Comic">
                        <label for="kategori" class="ilbl">Comic</label>
                    </li>
                    <li>
                        <button type="submit" name="submit">Add Book</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>

</body>

</html>