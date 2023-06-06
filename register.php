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
</head>

<body>
    <div class="logincontainer">
        <div class="circle">
            <div class="logo">xxx </div>
        </div>
        <div class="title">REGISTER</div>
        <!-- sementara -->
        <form action="" method="post">
            <div class="textlog">Name <br>
        <input type="text" name="name" id="name">
            <div class="textlog">Username <br>
        <input type="text" name="username" id="username">
            <div class="textlog">Password <br>
        <input type="password" name="password" id="password">
        <button type="submit" name="register">Register</button>
        </form>
        </div>
        <a href="login.php">Login</a>
      
    </div>
</body>

</html>