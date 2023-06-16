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
        echo "username atau kata sandi salah";
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
</head>

<body>
    <div class="logincontainer">
        <div class="circle">
            <div class="logo">
                <img src="img/logo.png" width="30" alt="logo">
            </div>
        </div>
        <div class="title">LOGIN</div>
        <!-- sementara -->
        <form action="" method="post">
            <div class="textlog">Username <br>
        <input type="text" name="username" id="username">
            <div class="textlog">Password <br>
        <input type="password" name="password" id="password">
        <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
        <button type="submit" name="login">Login</button>
        </form>
        </div>
        <a href="register.php">Sign up</a>
        <a href="" style="margin-left:125px;">Forgot password?</a>
    </div>
</body>

</html>