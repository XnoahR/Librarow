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

    <!-- Navbar -->
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
    
    <!-- Pengembalian Buku -->
    <h1>Form Pengembalian Buku</h1>
    <form>
    <table>
        <tr>
        <td><label for="judul" class="form-label-judul">Judul Buku:</label></td>
        </tr>
        <tr>
        <td>
            <ul class="judul-list">
            <li>
                <p>Judul Buku 1</p>
                <button type="button" class="form-button-kembalikan">Kembalikan</button>
            </li>
            <li>
                <p>Judul Buku 2</p>
                <button type="button" class="form-button-kembalikan">Kembalikan</button>
            </li>
            <li>
                <p>Judul Buku 3</p>
                <button type="button" class="form-button-kembalikan">Kembalikan</button>
            </li>
            </ul>
        </td>
        </tr>
    </table>
    </form>


    <div>
        <button class="buttonbb">Save Changes</button>
    </div>
    </form>
</body>
</html>