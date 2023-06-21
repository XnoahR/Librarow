<?php
include 'functions.php';

if (isset($_POST["submit"])) {

    if (add($_POST) > 0) {
        echo "<div class=\"position-fixed bottom-0 end-0 p-3\" style=\"z-index: 5\">
            <div id=\"successToast\" class=\"toast show\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\" data-bs-autohide=\"false\">
                <div class=\"toast-header bg-success text-white\">
                    <strong class=\"me-auto\">Success</strong>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"toast\" aria-label=\"Close\"></button>
                </div>
                <div class=\"toast-body\">
                    Data berhasil ditambahkan.
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successToast = new bootstrap.Toast(document.getElementById(\"successToast\"));
                successToast.show();
                var closeButtons = document.querySelectorAll('[data-bs-dismiss=\"toast\"]');
                closeButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        successToast.hide();
                    });
                });
                successToast._element.addEventListener('hidden.bs.toast', function () {
                    document.location.href = \"data_buku.php\";
                });
            });
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
    <style>
        body {
            background-color: #f4f7fa;
        }

        .card {
            border: none;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
            margin-bottom: 2em;
        }

        .card-header {
            background-color: #1167b1;
            color: #fff;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">LIBRAROW</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_page.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_logout.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout" data-bs-animation="true">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Form Add Book -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Add Book
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Judul Buku:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="pengarang" class="form-label">Pengarang:</label>
                                <input type="text" name="pengarang" id="pengarang" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Buku:</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="sampul" class="form-label">Sampul Buku:</label>
                                <input type="file" name="sampul" id="sampul" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori Buku:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kategori" id="horror" value="Horror">
                                    <label class="form-check-label" for="horror">Horor</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kategori" id="drama" value="Drama">
                                    <label class="form-check-label" for="drama">Drama</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kategori" id="biograph" value="Biograph">
                                    <label class="form-check-label" for="biograph">Biograph</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kategori" id="sociology" value="Sociology">
                                    <label class="form-check-label" for="sociology">Sociology</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kategori" id="romance" value="Romance">
                                    <label class="form-check-label" for="romance">Romance</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kategori" id="comic" value="Comic">
                                    <label class="form-check-label" for="comic">Comic</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Add Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>