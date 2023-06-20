<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/user_page.css">
    <style>
        body {
            background-color: #D0D0D0;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-label-judul {
            font-weight: bold;
            padding: 10px;
        }

        .judul-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .judul-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 10px;
        }

        .form-button-kembalikan {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-button-kembalikan:hover {
            background-color: #0056b3;
        }

        .buttonbb {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 0 auto;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .buttonbb:hover {
            background-color: #0056b3;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark" style="color: #D0EFFF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="user_page.php"><img src="img/logo.png" alt="logo" width="30"> LIBRAROW</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="user_page.php" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Home" data-bs-animation="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="book_categories.php" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Categories" data-bs-animation="true">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Profile" data-bs-animation="true">Profile</a>
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
                        <li>
                            <p>Judul Buku 4</p>
                            <button type="button" class="form-button-kembalikan">Kembalikan</button>
                        </li>
                        <li>
                            <p>Judul Buku 5</p>
                            <button type="button" class="form-button-kembalikan">Kembalikan</button>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>

        <div class="pagination">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>

    </form>

    <div>
        <button class="buttonbb">Save Changes</button>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
