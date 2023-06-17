<?php 

include 'functions.php';
session_start();
if(!isset($_SESSION["admin"])){
    header("Location:login.php");
    exit;
} 
$id = $_GET['id'];

   
    if(deleteb($id) > 0){
        echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'data_buku.php';
        </script>";
    }else{
        echo "Data error";
        }


?>