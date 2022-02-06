<?php 



$servername = "localhost";
$username = "root";
$password = "";
$db="pwd4u";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db,3308);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

define("TEMPLATES_PATH", realpath(dirname(__DIR__)."/resources/templates"));
define("CSS_PATH", realpath(dirname(__DIR__)."/css"));
define("CERTFICATE_PATH", realpath(dirname(__DIR__)."/uploaded_files/certificates/"));
define("IMAGE_PATH", realpath(dirname(__DIR__)."/uploaded_files/images/"));


// echo TEMP_PATH;
// echo dirname(__FILE__);

?>