<?php 
include 'functions.php';
session_start();
if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
} 
$id = $_GET['id'];
$book = query("SELECT * FROM buku WHERE id = '$id'")[0];

if(isset($_POST["submit"])){
   
    if(change($_POST) > 0){
        echo "<script>
        alert('Data berhasil diubah');
        document.location.href = 'data_buku.php';
        </script>";
    }else{
        echo "<script>
        alert('Data tetap sama');
        document.location.href = 'data_buku.php';
        </script>";
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
                <input type="hidden" name="id" id="id" value="<?=$book["id"]?>">
                <input type="hidden" name="sampullama" id="sampullama" value="<?=$book["sampul"]?>">
                <input type="hidden" name="kategori" id="kategori" value="<?=$book['kategori']?>">
                <li>
                <label for="name">Judul Buku: </label>
            <input type="text" name="name" id="name" value="<?=$book["nama"]?>">
                </li>
                <li>
                <label for="pengarang">Pengarang: </label>
            <input type="text" name="pengarang" id="pengarang" value="<?=$book["pengarang"]?>">
                </li>

                <li>
                <label for="jumlah">Jumlah Buku: </label>
            <input type="number" name="jumlah" id="jumlah" value="<?=$book["available"]?>">
                </li>
                <li>
                <label for="sampul">Sampul Buku: </label> <br>
                <img src="img/<?=$book["sampul"]?>" width="50" alt="<?=$book['nama']?>">
            <input type="file" name="sampul" id="sampul" >
                </li>
            
            <li>
                <button type="submit" name="submit">Save Changes</button>
            </li>
            </ul>
            </form>
        </div>
    </div>

</body>
</html>