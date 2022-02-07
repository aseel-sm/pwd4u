
<?php 
require_once(dirname(__DIR__) . "/config.php");

session_start();
if($_SESSION['authenticated']=='true' && $_SESSION['user_type']=="admin"){


$status=$_GET['status'];
$compId=$_GET['comp_id'];



$sql="UPDATE `complaint` SET `status`='$status' WHERE id=$compId";

if (mysqli_query($conn, $sql)) {
    if($status==5)
{

    
$sql="INSERT INTO `project`( `cId`, `status`) VALUES ($compId,$status)";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Accepted and open for Tenders');</script> ";
}


}
else echo "<script>alert('Rejected');</script> ";



echo "<script>window.location = '../../public/admin/verify_report.php';</script> ";

       
    }
    else
    { 
        echo "Error".mysqli_error($conn);
        echo "<script>alert('Sorry".mysqli_error($conn)." !!! There was an error ');
    window.location = '../../public/engineer/verify_report.php';</script> ";
    }
}



?>