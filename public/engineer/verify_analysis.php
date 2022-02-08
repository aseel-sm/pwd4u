<?php 

require_once(realpath(dirname(__DIR__)."../../resources/")."/config.php");
$type="engineer";
$errMsg="";
require_once(realpath(dirname(__DIR__)."../../resources/library/")."/no_access_redirect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (isset($_POST['submit'])) {
  
   $compId= $_POST['cId'];
    if (isset($_FILES['report'])) {
      $file_name = $_FILES['report']['name'];
      $file_size =$_FILES['report']['size'];
      $file_tmp =$_FILES['report']['tmp_name'];
      $file_type=$_FILES['report']['type'];
  } else {
      $errMsg="File is required\n";
  }
  if ($errMsg=='') {
    $hex=bin2hex(random_bytes('7'));
    $path=REPORT_PATH."/".$hex;
    $userId=$_SESSION['id'];
    if (move_uploaded_file($file_tmp, $path)) {
      $sql="UPDATE `complaint` SET `eId`='$userId',`status`='2',`initial`='$hex' WHERE id=$compId";
      if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Report Submitted ');</script>";
 header("Location:index.php");
      }
      else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
     
      echo "Error on Upload-----",$path,'\n';
  }



  }
  }}

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

    <title>PWD4U</title>

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
        
        
        
		 require_once(TEMPLATES_PATH . "\\engineer\side_drawer.php");
        ?>
    <!-- End of Sidebar -->

      <!-- Content Wrapper -->
         <!-- End of Content Wrapper -->

            <?php 
	 require_once(TEMPLATES_PATH . "\\engineer\\verify_analysis.php");


?>
  
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
           <!-- Page level plugins -->
           <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>
</body>






</html>