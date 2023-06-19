<?php
include 'functions.php';
session_start();
if(isset($_SESSION['login'])){
    header("Location:user_page.php");
    exit;
}
else if(isset($_SESSION['admin'])){
    header("Location:admin_page.php");
}


if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $resultad =mysqli_query($conn, "SELECT * FROM pustakawan WHERE username = '$username' AND password = '$password'");

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        setcookie('username',$username,time()+3600);
        setcookie('password',$password,time()+3600);
        header("Location:user_page.php");
        exit;
    }
    else if(mysqli_num_rows($resultad) == 1 ){
        $row = mysqli_fetch_assoc($resultad);
        $_SESSION['admin'] = true;
        setcookie('username',$username,time()+3600);
        setcookie('password',$password,time()+3600);
        header("Location:admin_page.php");
        exit;
    }
    else{
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
    </style>
</head>

<body>
    <div class="logincontainer">
        <div class="circle">
            <div class="logo">
                <img src="img/logo.png" width="30" alt="logo" class="animate__animated animate__rotateIn">
            </div>
        </div>
        <div class="title">LOGIN</div>
        <?php if(isset($errorMessage)): ?>
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
