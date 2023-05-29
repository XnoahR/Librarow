<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile_pustakawan.css">
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


    <!-- Profile Picture -->
    <div class="picture">
        <div class="imgpicture">
            <img src="img/orang.png" width="75%" alt="404! Image Not Found">
        </div>
    </div>
    
    <!-- Tabel Nama -->
    <div class="content">
    <table>
        <thead>
        <tr>
            <td class="column" rowspan="2" style="width: 15vh;">
                <img src="img/profil_orang.png" width="100%">
            </td>
            <td class="column" style="width: 95vh;">
                <p class="par">Nama</p>
            </td>
            <td class="column" rowspan="2" style="width: 15vh;">
                <p>Edit</p>
            </td>
        </tr>
        <tr>
            <td class="column" style="width: 95vh;">
                <p>John Doe</p>
            </td>
        </tr>
        </thead>
    </table>
    </div>
    
    <!-- Tabel Email -->
    <div class="content">
    <table>
        <thead>
        <tr>
            <td class="column" rowspan="2" style="width: 15vh;">
                <img src="img/profil_email.png" width="100%">
            </td>
            <td class="column" style="width: 95vh;">
                <p class="par">Email</p>
            </td>
            <td class="column" rowspan="2" style="width: 15vh;">
                <p>Edit</p>
            </td>
        </tr>
        <tr>
            <td class="column" style="width: 95vh;">
                <p>johndoedoejohn123@staff.ac.id</p>
            </td>
        </tr>
        </thead>
    </table>
    </div>

    <!-- Tabel Password -->
    <div class="content">
    <table>
        <thead>
        <tr>
            <td class="column" rowspan="2" style="width: 15vh;">
                <img src="img/profil_password.png" width="100%">
            </td>
            <td class="column" style="width: 95vh;">
                <p class="par">Password</p>
            </td>
            <td class="column" rowspan="2" style="width: 15vh;">
                <p>Edit</p>
            </td>
        </tr>
        <tr>
            <td class="column" style="width: 95vh;">
                <p>********</p>
            </td>
        </tr>
        </thead>
    </table>
</body>
</html>