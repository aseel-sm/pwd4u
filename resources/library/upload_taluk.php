<?php 
$string = file_get_contents("file.json");

$taluk=json_decode($string,true);
echo $taluk[0]['district'];
// var_dump($taluk);
// $sql="Insert into district ('id','district') values '$id','$district'";

$servername = "localhost";
$username = "root";
$password = "";
$db="pwd4u";
// Create connection
// $conn = mysqli_connect($servername, $username, $password,$db,3308);
// $did_count=1;
// foreach ($taluk as $key => $value) {
//     if ($did_count==$value['dId']) {
//         $id=$value['dId'];
//         $district=$value['district'];
//         $sql="Insert into district (`id`, `district`) values ($id,'$district')";
//         if (mysqli_query($conn, $sql)) {
//             echo "New record created successfully";
//           } else {
//             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//           }

//     $did_count++;
//     }
// }

// foreach ($taluk as $key => $value) {
   
        
//         $district=$value['dId'];
//         $tal=$value['vilage'];
//         $sql="Insert into taluk (`name`, `dId`) values ('$tal',$district)";
//         if (mysqli_query($conn, $sql)) {
//             echo "New record created successfully";
//           } else {
//             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//           }

    
    
// }