<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once(realpath(dirname(__DIR__)."../../resources/")."/config.php");
$projectId=$_GET['project_id'];
$compId=$_GET['comp_id'];
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$amount=$desc=$selectedDis=$selectedTal=$image=$errMsg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $amount = test_input($_POST["amount"]);
        $star_date = test_input($_POST["star_date"]);
        $desc = test_input($_POST["desc"]);
        $duration = test_input($_POST["duration"]);


        if ($errMsg=='') {
            $userId=$_SESSION['id'];
  
            $sql="INSERT INTO `bids`(`projectId`, `contractorId`, `bid_description`, `start_date`,
         `quoatation`, `duration`, `status`) VALUES 
         ('$projectId','$userId','$desc','$star_date','$amount','$duration','6')";


            if (mysqli_query($conn, $sql)) {
                $sql="UPDATE `complaint` SET `status`='6' WHERE id=$compId";


                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Bid Submintted');</script>";
                    header("Location:available_tenders.php");
                }
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
    







?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>File Complaint</title>
    <!-- Custom fonts for this template-->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />

  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
         require_once(TEMPLATES_PATH . "\contractor\side_drawer.php");
        ?>
    <!-- End of Sidebar -->

      <!-- Content Wrapper -->
            <?php
     require_once(TEMPLATES_PATH . "\contractor\\bid_tender.php");
?>
    <!-- End of Content Wrapper -->
    </div>
     <!-- End of Page Wrapper -->

     <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
        <!-- Bootstrap core JavaScript-->
        <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

</body>






</html>