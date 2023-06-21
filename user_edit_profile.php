<?php 
include 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
} 
$id = $_GET['id'];
$user = query("SELECT * FROM user WHERE id = '$id'")[0];

if(isset($_POST['submit'])){
    if(ChangeUserProfile($_POST) > 0){
        echo "<script>
        alert('Data berhasil diubah');
        document.location.href = 'user_profile.php';
        </script>";
    }
    else{
        echo "<script>
        document.location.href = 'user_profile.php';
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
  <style>
    body {
      background-color: #D0D0D0;
      overflow-x: hidden;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="user_page.php"><img src="img/logo.png" alt="logo" width="30"> LIBRAROW</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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

  <!-- Form Content -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="card-title text-center">Edit Profile</h4>
            <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id" value="<?= $user['id'] ?>">
              <input type="hidden" name="fotoLama" id="fotoLama" value="<?= $user['foto'] ?>">
              <div class="mb-3 text-center">
                <label for="foto" class="form-label">Foto Profil</label>
                <br>
                <img src="img/<?= $user['foto']; ?>" alt="Foto Profil" width="150">
                <br>
                <input type="file" name="foto" id="foto">
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" name="nim" id="nim" value="<?= $user['nim'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= $user['email'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="nohp" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" name="nohp" id="nohp" value="<?= $user['nohp'] ?>" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="<?= $user['password'] ?>" required>
              </div>
              <div class="text-center mb-3">
                <button name="submit" type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>