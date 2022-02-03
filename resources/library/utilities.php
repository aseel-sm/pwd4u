<?php
require_once(dirname(__DIR__) . "/config.php");


function is_user_exist($phone)
{
    global $conn;
    $sql="SELECT phone from users where phone='$phone'";
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
   

            return 1;
        } else {
            return 0;
        }
    }
}
function is_email_used($email)
{
    global $conn;

    $sql="SELECT email from users where email='$email'";
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            return 1;
        } else {
            
            return 0;
        }
    }
}
function is_licence_used($licence)
{
    global $conn;

    $sql="SELECT cLicense from contractor where cLicense='$licence'";
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            return 1;
        } else {
            
            return 0;
        }
    }
}

function get_userid_by_phone($phone)
{
    global $conn;

    $sql="SELECT id from users where phone='$phone'";
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            $row=mysqli_fetch_assoc($result);
            return $row['id'];
        } else {
            
            return 0;
        }
    }
}

function authenticate($phone, $password, $tb_name)
{
    global $conn;
    $sql="SELECT id,name,phone,password,type FROM `$tb_name` where phone='$phone'";
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==1) {
            $row=mysqli_fetch_assoc($result);
            echo implode(" ",$row);
            if ($row['password']==$password) {
                return $row;
            } else {
                return false;
            }
        } else {
            echo mysqli_error($conn);
        }
    } else {
        echo mysqli_error($conn);
    }
}
// $p=authenticate('9207418150', 'admin@123', 'users');

?>