<?php
include 'functions.php';



if(isset($_POST["register"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(register($_POST) > 0){
        echo "<script>
        alert('Account Created!');
        </script>";
    }
    else{
        echo "<script>
        alert('System Error!');
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
    <title>Librarow Register</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .animate__animated {
            animation-duration: 1s;
        }

        .animate__rotateIn {
            animation-name: rotateIn;
            animation-duration: 2s;
            animation-iteration-count: infinite;
        }

        @keyframes rotateIn {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .logincontainer {
            display: flex;
            flex-direction: column;
            align-items: left;
            justify-content: left;
            height: 85vh;
        }

        .title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
        }

    </style>
</head>

<body>
    <div class="logincontainer">
        <div class="circle">
            <div class="logo">
                <img src="img/logo.png" width="30" alt="logo" class="animate__animated animate__rotateIn">
            </div>
        </div>
        <div class="title">REGISTER</div>
        <form action="" method="post">
            <div class="textlog">
                <label for="nama">Nama</label>
                <input type="text" name="name" id="nama" class="form-control" required>
            </div>
            <div class="textlog">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="textlog">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
        <a href="login.php">Login</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>