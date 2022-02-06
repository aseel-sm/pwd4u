<?php 

require_once(dirname(__DIR__) . "/config.php");
$id = $_POST['id'];

if(isset($id)){
 
   $id=(int)$id;
       $sql="select * from taluk where dId=$id";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
        $result=mysqli_fetch_all($result,MYSQLI_ASSOC);
                $array=array('data'=>$result);
        echo json_encode($array);
         

    } else {
        echo mysqli_error($conn);
    }
}
?>