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

function add($data){
    
}

function delete($id){
    global $conn;
    mysqli_query($conn,"DELETE * FROM buku WHERE id = '$id'");

    return mysqli_affected_rows($conn);
}

function register($data){
    global $conn;

    $name = $data['name'];
    $username = strtolower(stripslashes($data['username']));
    $password = $data['password'];

    //username Check
    $usercheck = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($usercheck)){
        echo "<script>
        alert('Username Already Exist!');
        </script>";
        return false;
    }
    //Input data 
    mysqli_query($conn,"INSERT INTO user VALUES ('','$username','$password','$name','','','','aktif')");
    return(mysqli_affected_rows($conn));
}

?>