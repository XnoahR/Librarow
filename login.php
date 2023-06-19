<?php
include 'functions.php';
session_start();

if (isset($_SESSION['login'])) {
    header("Location:user_page.php");
    exit;
} else if (isset($_SESSION['admin'])) {
    header("Location:admin_page.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $resultad = mysqli_query($conn, "SELECT * FROM pustakawan WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        setcookie('username', $username, time() + 3600);
        setcookie('password', $password, time() + 3600);
        header("Location:user_page.php");
        exit;
    } else if (mysqli_num_rows($resultad) == 1) {
        $row = mysqli_fetch_assoc($resultad);
        $_SESSION['admin'] = true;
        setcookie('username', $username, time() + 3600);
        setcookie('password', $password, time() + 3600);
        header("Location:admin_page.php");
        exit;
    } else {
        $errorMessage = "Username atau kata sandi salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarow Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
         
.circles{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.circles li{
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background: rgba(255, 255, 255, 0.2);
    animation: animate 25s linear infinite;
    bottom: -150px;
    
}

.circles li:nth-child(1){
    left: 25%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}


.circles li:nth-child(2){
    left: 10%;
    width: 20px;
    height: 20px;
    animation-delay: 2s;
    animation-duration: 12s;
}

.circles li:nth-child(3){
    left: 70%;
    width: 20px;
    height: 20px;
    animation-delay: 4s;
}

.circles li:nth-child(4){
    left: 40%;
    width: 60px;
    height: 60px;
    animation-delay: 0s;
    animation-duration: 18s;
}

.circles li:nth-child(5){
    left: 65%;
    width: 20px;
    height: 20px;
    animation-delay: 0s;
}

.circles li:nth-child(6){
    left: 75%;
    width: 110px;
    height: 110px;
    animation-delay: 3s;
}

.circles li:nth-child(7){
    left: 35%;
    width: 150px;
    height: 150px;
    animation-delay: 7s;
}

.circles li:nth-child(8){
    left: 50%;
    width: 25px;
    height: 25px;
    animation-delay: 15s;
    animation-duration: 45s;
}

.circles li:nth-child(9){
    left: 20%;
    width: 15px;
    height: 15px;
    animation-delay: 2s;
    animation-duration: 35s;
}

.circles li:nth-child(10){
    left: 85%;
    width: 150px;
    height: 150px;
    animation-delay: 0s;
    animation-duration: 11s;
}



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
            align-items: center;
            justify-content: center;
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

        .forgot-password {
            margin-left: 0px;
        }

        .loader {
            width: 150px;
            height: 150px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader_cube {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 30px;
        }

        .loader_cube--glowing {
            z-index: 2;
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .loader_cube--color {
            z-index: 1;
            filter: blur(2px);
            background: linear-gradient(135deg, #1afbf0, #da00ff);
            animation: loadtwo 2.5s ease-in-out infinite;
        }

        @keyframes loadtwo {
            50% {
                transform: rotate(-80deg);
            }
        }
    </style>
</head>

<body>
<div>
            <ul class="circles">
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
    <div class="loader">
        <div class="circle">
            <div class="logo">
                    <div class="loader_cube loader_cube--color"></div>
                    <div class="loader_cube loader_cube--glowing">
                    <img src="img/logo.png" width="80" alt="logo" class="animate__animated animate__rotateIn">
                    </div>
                </div>
            </div>
        </div>
        <div class="title">LOGIN</div>
        <?php if (isset($errorMessage)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control form-control-animate" placeholder="Input your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-animate" placeholder="Input your password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" checked="checked" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember me</label>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <a href="register.php">Sign up</a>
        <a href="#" class="forgot-password">Forgot password?</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
