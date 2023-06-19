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

    //upload cover
    $cover = upload();
    if(!$cover){
        return false;
    }
    // $cover = htmlspecialchars($data['sampul']);

    $query = "INSERT INTO buku VALUES ('','$title','$author','$availability','$cover','$category')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $fileName = $_FILES['sampul']['name'];
    $fileSize = $_FILES['sampul']['size'];
    $fileError = $_FILES['sampul']['error'];
    $fileTmp = $_FILES['sampul']['tmp_name'];

    //file upload check 
    if($fileError === 4){
        echo "<script>
        alert('Upload gambar dahulu!');
        </script>
        ";
        return false;
    }
    //img file only
    $validFileExtension = ['jpg','jpeg','png'];
    $fileExtension = explode('.',$fileName);
    $fileExtension = strtolower(end($fileExtension));
    if(!in_array($fileExtension,$validFileExtension)){
        echo "<script>
        alert('Tipe File salah!');
        </script>
        ";
        return false;
    }

    //file size limit
    if($fileSize > 3145728){
        echo "<script>
        alert('File max 3MB!');
        </script>
        ";
        return false;
    }

    //New file name
    $fileNewName = uniqid();
    $fileNewName .= '.';
    $fileNewName .= $fileExtension;

    //file success
    move_uploaded_file($fileTmp,'img/'.$fileNewName);
    return $fileNewName;
}


function change($data){
    global $conn;
    //Ambil data dari table
    $id = $data['id'];
    $title = htmlspecialchars($data['name']);
    $author = htmlspecialchars($data['pengarang']);
    $availability = htmlspecialchars($data['jumlah']);
    $category = htmlspecialchars($data['kategori']);
    $oldCover = htmlspecialchars($data['sampullama']);

    if($_FILES['sampul']['error'] === 4){
        $cover = $oldCover;
    }
    else{
        $cover = upload();
    }
    
    $query = "UPDATE buku SET 
                nama = '$title',
                pengarang = '$author',
                available = '$availability',
                sampul = '$cover'
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
    mysqli_query($conn,"INSERT INTO user VALUES ('','$username','$password','$name','','','','aktif','')");
    return(mysqli_affected_rows($conn));
}

function borrow($data){
global $conn;
$id_pinjam = '';
$id_user = $data['id_user'];
$id_buku = $data['id_buku'];
$id_pustakawan = $data['id_pustakawan'];
mysqli_query($conn,"INSERT INTO peminjaman VALUES ('$id_pinjam','$id_user','$id_pustakawan','$id_buku','','','pending')");
return mysqli_affected_rows($conn);
}

function ChangeStatus($data){
    global $conn;
    $status = $data['status'];
    $id = $data['id'];

    mysqli_query($conn,"UPDATE user SET 
            status = '$status'
            WHERE id = '$id'
    ");

    return mysqli_affected_rows($conn);
}

function SearchMhs($keyword){
    global $conn;
    $query = "SELECT * FROM user WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%'";
    return query($query);
}

function AcceptBook($id){
    global $conn;
    $currentDate = date('Y-m-d');
    $query = "UPDATE peminjaman SET status_peminjaman = 'dipinjam',
     tgl_pinjam = '$currentDate'
    WHERE id_pinjam = '$id'";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}

function RejectBook($id){
    global $conn;
  
    $query = "UPDATE peminjaman SET status_peminjaman = 'ditolak'
    WHERE id_pinjam = '$id'";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}
?>