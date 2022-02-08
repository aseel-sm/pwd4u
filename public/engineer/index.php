<?php 

require_once(realpath(dirname(__DIR__)."../../resources/")."/config.php");
$type="engineer";

require_once(realpath(dirname(__DIR__)."../../resources/library/")."/no_access_redirect.php");
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
	 require_once(TEMPLATES_PATH . "\\engineer\dashboard.php");


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
</body>






</html>