
<?php 
require_once(dirname(__DIR__) . "/config.php");

session_start();
if($_SESSION['authenticated']=='true' && $_SESSION['user_type']=="engineer"){
    echo "HI";

$userId=$_GET['user_id'];
$compId=$_GET['comp_id'];
echo $userId,$compId;

$sql="UPDATE `complaint` SET `eId`='$userId',`status`='3' WHERE id=$compId";

if (mysqli_query($conn, $sql)) {

        echo "<script>alert('Request Handled');
        window.location = '../../public/engineer/verify_analysis.php';</script> ";
    }
    else
    { 
        echo "Error".mysqli_error($conn);
        echo "<script>alert('Sorry".mysqli_error($conn)." !!! There was an error ');
    window.location = '../routes/bloodbank/adminboard.php';</script> ";
    }
}



?>