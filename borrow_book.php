<?php 
include 'functions.php';
session_start();
$id = $_GET['id'];
$book = query("SELECT * FROM buku WHERE id ='$id'")[0];
$booktitle = $book['nama'];
$username = $_COOKIE['username'];
$user = query("SELECT * FROM user WHERE username = '$username'")[0];
$id_user= $user['id'];

if(isset($_POST['submit'])){
    if(borrow($_POST) > 0){
    echo "<script>
    alert('Buku berhasil dipinjam');
    </script>";
    }
    else{
        echo "Data ERROR!";
    }
}

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

    <div class="bbcontainer">
        <div class="bbframe">
            <div class="bbimgcon">
                <img src="img/stevejob.png" alt="">
            </div>
        </div>
        <div class="bbtextcon">
            <div class="bbtitle">
                <p><?= $book['nama'] ?></p>
            </div>
            <div class="bbdesc">
                <p><b>Description</b></p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="bbauthor">
                <div class="authtxt">Author</div>
                <p><?= $book['pengarang'] ?></p>
            </div>
            <div class="bbava">
                <div class="avatxt">Available Book</div>
                <p><?= $book['available'] ?></p>
            </div>
            
        </div>
    </div>

    <form action="" method="post">
        <input type="hidden" name="id_user"id="id_user" value="<?=$id_user?>">
        <input type="hidden" name="id_buku"id="id_buku" value="<?=$id?>">
        <input type="hidden" name="username_admin"id="username_admin" value="tulus">
        <button class="buttonbb" type="submit" name="submit" onclick="return confirm('Pinjam buku <?=$booktitle?>?');">Borrow</button>
    </form>

<br><br>
</body>

</html>