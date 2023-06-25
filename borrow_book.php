<?php 
include 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
} 
$id = $_GET['id'];
$book = query("SELECT * FROM buku WHERE id ='$id'")[0];
$booktitle = $book['nama'];
$username = $_COOKIE['username'];
$user = query("SELECT * FROM user WHERE username = '$username'")[0];
$id_user= $user['id'];

if(isset($_POST['submit'])){
    if($book['available'] <1){
        echo "<script>
        alert('Buku Habis!');
        document.location.href = 'borrow_book.php?id={$book['id']}';
        </script>";
        exit;
    }
    else{
    if(borrow($_POST) > 0){
    echo "<script>
    alert('Permintaan Peminjaman Berhasil!');
    document.location.href = 'borrow_book.php?id={$book['id']}';
    </script>";
    }
    else{
        echo "<script>
        alert('Permintaan Buku ditolak');
        document.location.href = 'borrow_book.php?id={$book['id']}';
        </script>";
    }
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
    <link rel="stylesheet" href="css/user_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body style="background-color: #D0D0D0;">

    <!--Navbar-->
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
                <li class="nav-item">
                <a class="nav-link" href="user_logout.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout" data-bs-animation="true">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="bbcontainer" style="padding-bottom:50px">
        <div class="bbframe">
            <div class="bbimgcon">
                <img src="img/<?=$book['sampul']?>" alt="">
            </div>
        </div>
        <div class="bbtextcon">
            <div class="bbtitle" style="margin-bottom: 50px;">
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
        <input type="hidden" name="id_user" id="id_user" value="<?=$id_user?>">
        <input type="hidden" name="id_buku" id="id_buku" value="<?=$id?>">
        <input type="hidden" name="id_pustakawan" id="id_pustakawan" value="1">
        <button class="buttonbb" type="button" data-toggle="modal" data-target="#myModal">Borrow</button>
    

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Confirm Borrow</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Pinjam buku <?=$booktitle?>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-animate" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary btn-animate" name="submit">Borrow</button>
      </div>
    </div>
  </div>
</div>
</form>

<br><br>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>