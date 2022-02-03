<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// echo $_SESSION['authenticated'],$_SESSION['user_type'];
if ($_SESSION['user_type']!=$type || $_SESSION['authenticated']!=true) {
    header("Location:../../index.php");
   
 
}
?>