<?php 
session_start();
if ($_SESSION['authenticated']=='true' && $_SESSION['user_type']=="admin") {
    $id=$_POST['id'];
    $status=$_POST["status"];
    $new_status=$status==0? 1:0;
    $sql="UPDATE users set status=$new_status where id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    }
}

?>
<?php 
require_once(dirname(__DIR__) . "/config.php");

session_start();
if($_SESSION['authenticated']=='true' && $_SESSION['user_type']=="admin"){

$_id=$_GET['i'];
$s=$_GET['s'];


$sql="update blood_request set is_verified='$s' where request_id=$_id";
    if (mysqli_query($conn, $sql)) {

        echo "<script>alert('Request Handled');
        window.location = '../routes/bloodbank/adminboard.php';</script> ";
    }
    else
    { 
        echo "<script>alert('Sorry".mysqli_error($conn)." !!! There was an error ');
    window.location = '../routes/bloodbank/adminboard.php';</script> ";
    }
}



?>