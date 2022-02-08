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

function authenticate($email, $password, $tb_name)
{
    global $conn;
    $sql="SELECT id,name,phone,password,type,status FROM `$tb_name` where email='$email'";
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==1) {
            $row=mysqli_fetch_assoc($result);
            echo implode(" ", $row);
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

function get_districts()
{
    global $conn;
    $sql="select * from district";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
      
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
function get_taluks()
{
    global $conn;
    $sql="select * from taluk";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
       
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}


function check_user_status($id)
{
    global $conn;
    $sql="SELECT status from users where id=$id";
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        $result=mysqli_fetch_assoc($result);
        return $result['status'];
    }
}
function get_not_accepted_users($type)
{
    if ($type==1) {
        $table="users";
        $sql="SELECT * FROM `users` WHERE id NOT IN (SELECT cId FROM contractor) AND id NOT IN (SELECT id FROM overseer) AND id NOT IN (SELECT id FROM engineer) AND type !=0 AND status=0";
    }
    
    if ($type==2) {
        $table="overseer";
        $sql="SELECT * ,users.id as id FROM users INNER JOIN `$table` ON `$table`.id=`users`.id INNER JOIN taluk ON taluk.id=`$table`.tId INNER JOIN district ON taluk.dId =district.id  WHERE status =0";
    }
    if ($type==3) {
        $table="contractor";
        $sql="SELECT * FROM users INNER JOIN `$table` ON `$table`.cId=`users`.id WHERE status =0";
    }
    if ($type==4) {
        $table="engineer";
        $sql="SELECT *,users.id as id FROM users INNER JOIN `$table` ON `$table`.id=`users`.id  INNER JOIN district ON `$table`.dId =district.id  WHERE status =0";
    }
    global $conn;
   
    

    
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
        //  var_dump( mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
function get_users_by_type($type)
{
    if ($type==1) {
        $table="users";
        $sql="SELECT * FROM `users` WHERE id NOT IN (SELECT cId FROM contractor) AND id NOT IN (SELECT id FROM overseer) AND id NOT IN (SELECT id FROM engineer) AND type !=0 AND status=1";
    }
    
    if ($type==2) {
        $table="overseer";
        $sql="SELECT * FROM users INNER JOIN `$table` ON `$table`.id=`users`.id INNER JOIN taluk ON taluk.id=`$table`.tId INNER JOIN district ON taluk.dId =district.id  WHERE status =1";
    }
    if ($type==3) {
        $table="contractor";
        $sql="SELECT * FROM users INNER JOIN `$table` ON `$table`.cId=`users`.id WHERE status =1";
    }
    if ($type==4) {
        $table="engineer";
        $sql="SELECT * FROM users INNER JOIN `$table` ON `$table`.id=`users`.id  INNER JOIN district ON `$table`.dId =district.id  WHERE status =1";
    }
    global $conn;
   
    

    
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
        //  var_dump( mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
// check_user_status(17)
//  get_not_accepted_users(2)
function get_complaints_user_id($id)
{
    global $conn;
    $sql="select * from complaint where userId=$id";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
       
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}

function get_complaint_status($code){

    if($code==0)
    return "Submitted to overseer";

    if($code==1)
    return "Analysis report submitted to engineer";
    if($code==2)
    return "Verified by Senior Engineer and Initial report submitted";
    if($code==3)
    return "Rejected by Senior Engineer";
    if($code==4)
    return "Rejected by Administrator";
    if($code==5)
    return "Accepted by Administrator and Tender opened";
    if($code==6)
    return "Bid submitted.Waiting to confirm";
    if($code==7)
    return "Bid didn't approved.";
    if($code==8)
    return "Bid approved.Waiting to start work";
    if($code==9)
    return "Work has been started";
    if($code==10)
    return "Work Completed";

    
}


function convert_timestamp($time){

    $db = $time;
    $timestamp = strtotime($db);
    return date("m-d-Y", $timestamp);
    
}


function get_taluk_by_user_id($id){
    global $conn;
    $sql="SELECT tId FROM `overseer` WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        $result=mysqli_fetch_assoc($result);
        return $result['tId'];
    }
}


function get_complaints_to_upload_by_taluk($id)
{
    global $conn;
    $sql="select * from complaint where talukId=$id AND status=0";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //    var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
function get_complaints_by_taluk($id,$userId)
{
    global $conn;
    $sql="select * from complaint where talukId=$id AND oId=$userId";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //    var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
// get_complaints_by_taluk(5);


function get_district_by_user_id($id){
    global $conn;
    $sql="SELECT dId FROM `engineer` WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        $result=mysqli_fetch_assoc($result);
        // var_dump($result);
        return $result['dId'];
    }
}

function get_complaints_by_district($id)
{
    global $conn;
    $sql="select * from complaint where status=1 AND talukId IN (SELECT id FROM taluk WHERE dId=$id)";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
function get_complaints_for_admin()
{
    global $conn;
    $sql="select * from complaint where status=2";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
// get_district_by_user_id(20);
// get_complaints_by_district(10);

function get_tenders_contractor()
{
    global $conn;
    $sql="SELECT *,project.id as projectId FROM `project` INNER JOIN complaint ON complaint.id=project.cId
    INNER JOIN taluk ON complaint.talukId=taluk.id 
    INNER JOIN district ON district.id=taluk.dId 
    WHERE complaint.status=5;";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
function get_tenders_by_id($id)
{
    global $conn;
    $sql="SELECT *,project.id as projectId FROM `project` 
    INNER JOIN complaint ON complaint.id=project.cId
     INNER JOIN taluk ON complaint.talukId=taluk.id 
     INNER JOIN district ON district.id=taluk.dId
      WHERE complaint.status=5 AND project.id=$id;;";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}

function get_submitted_bid_contractor($id)
{
    global $conn;
    $sql="SELECT b.bidId,b.projectId,b.bid_description,b.status,b.createdAt,b.duration,b.quoatation,complaint.initial FROM `bids` as b
     INNER JOIN project ON projectId=project.id 
     LEFT JOIN complaint ON complaint.id=project.cId
      WHERE b.status>=6 AND b.contractorId=$id;";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
function get_projects_overseer($id)
{
    global $conn;
    $sql="SELECT p.id as pid, `cId`, p.status as pStatus,`tenderId`,p.start_date as sdate,p.completed_date as cdate,complaint.initial,complaint.title FROM `project` as p
    INNER JOIN complaint ON complaint.id=p.cid WHERE complaint.oId=$id;";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}

function get_submitted_bid_by_project_id($id)
{
    global $conn;
    $sql="SELECT b.bidId,b.projectId,b.contractorId,b.bid_description,b.status,b.createdAt,b.duration,b.quoatation,complaint.initial,contractor.certificatePath,complaint.id as comp_id FROM `bids` as b
    INNER JOIN project ON projectId=project.id 
    LEFT JOIN complaint ON complaint.id=project.cId
    LEFT JOIN contractor ON b.contractorId=contractor.cId
     WHERE b.status=6 AND b.projectId=$id;";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}

function get_bidden_contractor($id)
{
    global $conn;
    $sql="SELECT b.bidId,b.projectId,b.bid_description,b.status,b.createdAt,b.duration,b.quoatation,complaint.initial,complaint.id as compId FROM `bids` as b
     INNER JOIN project ON projectId=project.id 
     LEFT JOIN complaint ON complaint.id=project.cId
      WHERE b.status>=8 AND b.contractorId=$id;";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}

function get_projects_engineer($id)
{
    global $conn;
    $sql="SELECT p.id as pid, `cId`, p.status as pStatus,`tenderId`,p.start_date as sdate,p.completed_date as cdate,complaint.initial,complaint.title FROM `project` as p
    INNER JOIN complaint ON complaint.id=p.cid WHERE complaint.eId=$id;";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}
function get_projects_admin()
{
    global $conn;
    $sql="SELECT p.id as pid, p.`cId`, p.status as pStatus,`tenderId`,p.start_date as sdate,p.completed_date,taluk.taluk_name,district.district,
    p.completed_date as cdate,complaint.initial,complaint.title FROM `project` as p
     INNER JOIN complaint ON complaint.id=p.cid 
     INNER JOIN taluk ON taluk.id=complaint.talukId
     INNER JOIN district ON district.id=taluk.dId;";
    if (mysqli_query($conn, $sql)) {
        $result= mysqli_query($conn, $sql);
    
    //   var_dump(mysqli_fetch_assoc($result));
        return $result;
    } else {
        echo mysqli_error($conn);
    }
}

function process($sql){

    global $conn;
    
    if (mysqli_query($conn, $sql)) {
        $result=mysqli_query($conn, $sql);
        $result=mysqli_fetch_assoc($result);
       
        return $result['count'];
    }

}

function admin_dashboard(){
   $sql="SELECT COUNT(id) as count FROM `project`" ;
   $admin['project']=process($sql);
   $sql="SELECT COUNT(id) as count FROM `project` WHERE status=10" ;
   $admin['project_c']=process($sql);
   $sql="SELECT COUNT(id) as count FROM `users` WHERE type=1 AND status=1" ;
   $admin['public']=process($sql);
   $sql="SELECT COUNT(id) as count FROM `users` WHERE type=2 AND status=1" ;
   $admin['overseer']=process($sql);
   $sql="SELECT COUNT(id) as count FROM `users` WHERE type=3 AND status=1" ;
   $admin['contractor']=process($sql);
   $sql="SELECT COUNT(id) as count FROM `users` WHERE type=4 AND status=1" ;
   $admin['eng']=process($sql);
   $sql="SELECT COUNT(id) as count FROM `users` WHERE status=0" ;
   $admin['to_accept']=process($sql);
   $sql="SELECT COUNT(id) as count FROM `complaint`" ;
   $admin['complaint']=process($sql);

   return $admin;
}
function over_dashboard($user,$taluk){
   $sql="SELECT COUNT(id) as count FROM `complaint` WHERE oId=$user" ;
   $over['comp_res']=process($sql);
   $sql="SELECT COUNT(id) as count FROM `complaint` WHERE talukId=$taluk AND status=0" ;
   $over['comp_new']=process($sql);
   $sql="SELECT COUNT(project.id) as count FROM `project` LEFT JOIN complaint ON complaint.id=project.cId WHERE complaint.oId=$user AND complaint.status=5" ;
   $over['new_tender']=process($sql);
   $sql="SELECT COUNT(project.id) as count FROM `project` LEFT JOIN complaint ON complaint.id=project.cId WHERE complaint.oId=$user AND complaint.status=10" ;
   $over['work_done']=process($sql);
   $sql="SELECT COUNT(bids.bidId) as count FROM `bids`
   LEFT JOIN project ON project.id=bids.projectId
   LEFT JOIN complaint ON complaint.id=project.cId WHERE complaint.oId=$user AND bids.status=6" ;
   $over['new_quote']=process($sql);
  

   return $over;
}
function eng_dashboard($user,$dis){
   $sql="SELECT COUNT(complaint.id) as count FROM `complaint`
   LEFT JOIN taluk ON taluk.id=complaint.talukId
   WHERE taluk.dId=$dis AND complaint.status=1";
   $eng['new_ans']=process($sql);
 
   $sql="SELECT COUNT(project.id) as count FROM `project` 
   LEFT JOIN complaint ON complaint.id=project.cId
   WHERE complaint.eId=$user AND complaint.status>=5" ;
   $eng['project_acc']=process($sql);
   
  

   return $eng;
}


function cont_dashboard($cId){
    $sql="SELECT COUNT(bidId) as count FROM `bids`WHERE contractorId=$cId" ;
    $cont['sub']=process($sql);
    $sql="SELECT COUNT(id) as count FROM `project` WHERE status=5" ;
    $cont['avail']=process($sql);
    $sql="SELECT COUNT(bidId) as count FROM `bids`WHERE contractorId=$cId AND status>=8" ;
    $cont['bidden']=process($sql);

   
 
    return $cont;
 }


function user_dashboard($id){
    $sql="SELECT COUNT(id) as count FROM `complaint` WHERE userId=$id" ;
    $user['filed']=process($sql);
    $sql="SELECT COUNT(id) as count FROM `complaint` WHERE userId=$id AND status=10" ;
    $user['solved']=process($sql);

   
 
    return $user;
 }