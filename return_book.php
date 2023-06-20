<?php
include 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location:login.php");
    exit;
} 
 $id = $_GET['id'];
    if(ReturnBook($id) > 0){
        echo "<script>
        alert('Permintaan dikirim!');
        document.location.href = 'notifikasi_user.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Permintaan Ditolak!');
        document.location.href = 'notifikasi_user.php';
        </script>";
    }
?>