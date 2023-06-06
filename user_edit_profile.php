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

<!-- Form Content -->
<form>
        <!-- Nama -->
        <div>
            <label>Nama</label> <br>
            <input name="nama" type="text" placeholder="Masukkan nama">
        </div>
        <!-- NIM -->
        <div>
            <label>NIM</label> <br>
            <input name="nama" type="text" placeholder="Masukkan nama">
        </div>
        <!-- Email -->
        <div>
            <label>Email</label> <br>
            <input name="alamat" type="text" placeholder="Masukkan alamat">
        </div>
        <!-- Username -->
        <div>
            <label>Username</label> <br>
            <input name="alamat" type="text" placeholder="Masukkan alamat">
        </div>
        <!-- Password -->
        <div>
            <label>Password</label> <br>
            <input name="alamat" type="text" placeholder="Masukkan alamat">
        </div>
        <!-- Button -->
        <div>
        <button class="buttonbb">Save Changes</button>
        </div>
</form>
</body>
</html>