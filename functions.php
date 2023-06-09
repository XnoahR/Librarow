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
    global $conn;
    //Ambil data dari table
    $title = htmlspecialchars($data['name']);
    $author = htmlspecialchars($data['pengarang']);
    $availability = htmlspecialchars($data['jumlah']);
    $category = htmlspecialchars($data['kategori']);

    $query = "INSERT INTO buku VALUES ('','$title','$author','$availability','','$category')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}
function change($data){
    global $conn;
    //Ambil data dari table
    $id = $data['id'];
    $title = htmlspecialchars($data['name']);
    $author = htmlspecialchars($data['pengarang']);
    $availability = htmlspecialchars($data['jumlah']);
    $category = htmlspecialchars($data['kategori']);

    $query = "UPDATE buku SET 
                nama = '$title',
                pengarang = '$author',
                available = '$availability'
                WHERE id = '$id'";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function deleteb($id){
    global $conn;
    $book = "DELETE FROM buku WHERE id = '$id'";
    mysqli_query($conn,$book);

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

function borrow($data){
global $conn;
$id_pinjam = '';
$id_user = $data['id_user'];
$id_buku = $data['id_buku'];
$username_admin = $data['username_admin'];
mysqli_query($conn,"INSERT INTO peminjaman VALUES ('$id_pinjam','$id_user','$id_buku','$username_admin','','','pending')");
return mysqli_affected_rows($conn);
}
?>