<?php
include 'functions.php';

if(isset($_POST["register"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validasi password
    $lowercaseRegex = '/^(?=.*[a-z])/';
    $uppercaseRegex = '/^(?=.*[A-Z])/';
    $numericRegex = '/^(?=.*\d)/';
    $lengthRegex = '/^(?=.{8,})/';

    if (!preg_match($lowercaseRegex, $password) || !preg_match($uppercaseRegex, $password) || !preg_match($numericRegex, $password) || !preg_match($lengthRegex, $password)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Password must contain at least one lowercase letter, one uppercase letter, one numeric digit, and be at least 8 characters long.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {
        if(register($_POST) > 0){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Account Created!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                System Error!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';   
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
    <title>Librarow Register</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logincontainer {
            display: flex;
            flex-direction: column;
            align-items: left;
            justify-content: left;
            height: 85vh;
            position: relative; /* Tambahkan properti ini */
            z-index: 2; /* Tambahkan properti ini */
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

        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .background-animation li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }

        .background-animation li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .background-animation li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .background-animation li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .background-animation li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .background-animation li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .background-animation li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .background-animation li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .background-animation li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .background-animation li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .background-animation li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }
    </style>
</head>

<body>
<script>
        function validatePassword() {
            var password = document.getElementById("password").value;

            var lowercaseRegex = /^(?=.*[a-z])/;
            var uppercaseRegex = /^(?=.*[A-Z])/;
            var numericRegex = /^(?=.*\d)/;
            var lengthRegex = /^(?=.{8,})/;

            if (!lowercaseRegex.test(password) || !uppercaseRegex.test(password) || !numericRegex.test(password) || !lengthRegex.test(password)) {
                var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    'Password must contain at least one lowercase letter, one uppercase letter, one numeric digit, and be at least 8 characters long.' +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>';
                document.getElementById("alert-container").innerHTML = alertDiv;
                return false;
            }

            return true;
        }
    </script>
    <div class="background-animation">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
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
                <input type="text" name="name" id="nama" class="form-control form-control-animate" placeholder="Input your name" required>
            </div>
            <div class="textlog">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control form-control-animate" placeholder="Input your username" required>
            </div>
            <div class="textlog">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-animate" placeholder="Input your password" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
        <a href="login.php">Login</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
