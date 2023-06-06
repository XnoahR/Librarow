<?php 
include 'functions.php';
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