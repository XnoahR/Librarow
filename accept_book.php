<?php
include 'functions.php';
session_start();
if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
} 
 $id = $_GET['id'];
    if(AcceptBook($id) > 0){
        echo "<script>
        alert('Permintaan disetujui!');
        document.location.href = 'notifikasi_pustakawan.php';
        </script>";
    }
    else{
        echo "<script>
        alert('ERROR!');
        document.location.href = 'notifikasi_pustakawan.php';
        </script>";
    }
?>