
<?php
require_once(dirname(__DIR__) . "/config.php");

session_start();
if ($_SESSION['authenticated']=='true' && $_SESSION['user_type']=="contractor") {
    $status=$_GET['status'];
    
    $compId=$_GET['comp_id'];
    $bid_id=$_GET['bid_id'];

    $date="";

    $sql="UPDATE `bids` SET `status`= $status WHERE bidId=$bid_id";
  
    $sql3="UPDATE `complaint` SET `status`= $status WHERE id=$compId";
    if ($status==9) {
        $sql4="UPDATE `project` SET `status`= $status ,`start_date`=NOW() WHERE tenderId=$bid_id ";
    }
    if ($status==10) {
        $sql4="UPDATE `project` SET `status`= $status,`completed_date`=NOW() WHERE tenderId=$bid_id ";
    }


    if (mysqli_query($conn, $sql)) {
        if (mysqli_query($conn, $sql3)) {
            if (mysqli_query($conn, $sql4)) {
                echo "<script>alert('Updated');</script> ";

                echo "<script>window.location = '../../public/contractor/bidden_tenders.php';</script> ";
            } else {
                echo "Error".mysqli_error($conn);
            }
        } else {
            echo "Error".mysqli_error($conn);
        }
    } else {
        echo "Error".mysqli_error($conn);
        echo "<script>alert('Sorry".mysqli_error($conn)." !!! There was an error ');
    window.location = '../../public/engineer/verify_report.php';</script> ";
    }
}
?>