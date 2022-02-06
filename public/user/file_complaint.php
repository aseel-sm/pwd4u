<?php 

if (session_status() === PHP_SESSION_NONE) {
  session_start();
  
}
require_once(realpath(dirname(__DIR__)."../../resources/")."/config.php");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$title=$desc=$selectedDis=$selectedTal=$image=$errMsg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (isset($_POST['submit'])) {
    

      $title = test_input($_POST["title"]);
      $selectedDis = test_input($_POST["district"]);
      $selectedTal = test_input($_POST["taluk"]);
      $desc = test_input($_POST["desc"]);
 
      if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
    } else {
        $errMsg=$errMsg."Image is required\n";
    }

    if ($errMsg=='') {
      $hex=bin2hex(random_bytes('6'));
      $path=IMAGE_PATH."/".$hex;
      $userId=$_SESSION['id'];
      if (move_uploaded_file($file_tmp, $path)) {
        $sql="INSERT INTO `complaint` ( `title`, `description`,`talukId`, `userId`,`image` )  VALUES ('$title','$desc',$selectedTal,'$userId','$hex')";
        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Filed Complaint');</script>";
          header("Location:view_complaint.php");
        }
        else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
       
        echo "Error on Upload-----",$path,'\n';
    }



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
		 require_once(TEMPLATES_PATH . "\user\side_drawer.php");
        ?>
    <!-- End of Sidebar -->

      <!-- Content Wrapper -->
            <?php 
	 require_once(TEMPLATES_PATH . "\user\\file_complaint.php");
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
    <script>
$("#district_select").change(function () {
let id = $('#district_select').val(); //get the current value's option
console.log(id);
$.ajax({
  type: "POST",
  url: "../../resources/library/getTaluksbasedOnDistrict",
  data: { id: id },
  success: function (data) {
    console.log(data);
    let options = JSON.parse(data);
    console.log(options);
    for (i = 0; i < options.data.length; i++) {
      $("#taluk").append(`<option value="${options.data[i].id}">
   ${options.data[i].taluk_name}
</option>`);
    }
  },
});
});


    </script>
</body>






</html>