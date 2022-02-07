
<?php 
require_once(dirname(__DIR__) . "/config.php");

session_start();
if ($_SESSION['authenticated']=='true' && $_SESSION['user_type']=="overseer") {
    $status=$_GET['status'];
    $p_id=$_GET['p_id'];
    $compId=$_GET['comp_id'];
    $bid_id=$_GET['bid_id'];



    $sql="UPDATE `bids` SET `status`=8 WHERE bidId=$bid_id";
    $sql2="UPDATE `bids` SET `status`=7 WHERE projectId=$p_id";
    $sql3="UPDATE `complaint` SET `status`=8 WHERE id=$compId";
    $sql4="UPDATE `project` SET `status`=8,`tenderId`=$bid_id WHERE id=$p_id";

    if (mysqli_query($conn, $sql2)) {
        if (mysqli_query($conn, $sql)) {
            if (mysqli_query($conn, $sql3)) {
                if (mysqli_query($conn, $sql4)) {
                    echo "<script>alert('Accepted');</script> ";

                    echo "<script>window.location = '../../public/overseer/';</script> ";
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
    } else {
        echo "Error".mysqli_error($conn);
    }
}
?>