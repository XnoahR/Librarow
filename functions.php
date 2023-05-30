<?php
$conn = mysqli_connect('localhost','root','','librarow');

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $row = [];
    while($dbs = mysqli_fetch_assoc($result)){
        $row[] = $dbs;
    }
    return $row;
}



?>