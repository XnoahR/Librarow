<?php
//Hapus Session 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

//Hapus Cookie
setcookie('id','',time()-3601);
setcookie('username','',time()-3601);
setcookie('password','',time()-3601);

header("Location:login.php");
exit;
?>