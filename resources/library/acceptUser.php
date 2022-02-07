
<?php 
require_once(dirname(__DIR__) . "/config.php");

session_start();
if($_SESSION['authenticated']=='true' && $_SESSION['user_type']=="admin"){

$status=$_GET['status'];
$user_id=$_GET['user'];
$type=$_GET['type'];


$sql="UPDATE users set status='$status' where id=$user_id";
    if (mysqli_query($conn, $sql)) {

        echo "<script>alert('Request Handled');
        window.location = '../../public/admin/new_registration.php?user_type=$type';</script> ";
    }
    else
    { 
        echo "<script>alert('Sorry".mysqli_error($conn)." !!! There was an error ');
    window.location = '../../public/admin/new_registration.php?user_type=$type';</script> ";
    }
}



?>