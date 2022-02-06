<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
  if (isset($_SESSION['authenticated'])&&isset($_SESSION['user_type'])) {
      if ($_SESSION['user_type']!=$type || $_SESSION['authenticated']!=true) {
          header("Location:public/".$_SESSION['user_type']."/");
      }
  }
require_once(realpath(dirname(__FILE__)."//resources/")."/config.php");
 require_once(realpath(dirname(__FILE__)."//resources/library")."/utilities.php");
$district_list=get_districts();


//  while($dis=mysqli_fetch_assoc(get_districts())) {
//   echo "id: " . $dis["id"]. " - Name: " . $dis["district"]. "<br>";
// }
$errMsg=$cetErr="";
$name = $email = $address = $password = $confirm = $usertype =$phone=$licence=$qualification=$district=$taluk= "";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $phone = test_input($_POST["phone"]);
        $user_exist=is_user_exist($phone);
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $address = test_input($_POST["address"]);
        $password = test_input($_POST["password"]);
        $confirm = test_input($_POST["confirm"]);
        $usertype = test_input($_POST["usertype"]);
        if ($user_exist==0) {
            $is_email_used=is_user_exist($phone);
            if (is_email_used($email)==1) {
                $errMsg=$errMsg."Email already used\n";
            }
         
    
            if (is_email_used($email)==1) {
                $errMsg=$errMsg."Email already used\n";
            }

            if ($usertype==2 || $usertype==4) {
                if (empty($_POST["qualification"])) {
                    $errMsg=$errMsg."No qualification given\n";
                } else {
                    $qualification = test_input($_POST["qualification"]);
                }
                if (isset($_FILES['certificate'])) {
                    $file_name = $_FILES['certificate']['name'];
                    $file_size =$_FILES['certificate']['size'];
                    $file_tmp =$_FILES['certificate']['tmp_name'];
                    $file_type=$_FILES['certificate']['type'];
                } else {
                    $errMsg=$errMsg."Certificate is required\n";
                }
                

                if (empty($_POST["district"])) {
                    $errMsg=$errMsg."No District given\n";
                } else {
                    $district = test_input($_POST["district"]);
                }
                
                
                if ($usertype==2) {
                    if (empty($_POST["taluk"])) {
                        $errMsg=$errMsg."No Taluk given\n";
                    } else {
                        $taluk = test_input($_POST["taluk"]);
                    }
                }
            } elseif ($usertype==3) {
                if (empty($_POST["licence"])) {
                    $errMsg=$errMsg."Licence number required\n";
                } else {
                    $licence = test_input($_POST["licence"]);
                    $is_licence_used=is_licence_used($licence);
                    if ($is_licence_used==1) {
                        $errMsg=$errMsg."Licence number used\n";
                    }
                }
            }
            if ($confirm==$password && $errMsg=='') {
                $sql = "INSERT INTO `users`( `name`, `email`, `phone`, `password`, `type`, `status`) VALUES
                         ('$name','$email','$phone','$password','$usertype',0)";

                if (mysqli_query($conn, $sql)) {
                    $signUpSuccess=1;
                    $new_user_id=get_userid_by_phone($phone);
                    if ($usertype==2) {
                        $path=CERTFICATE_PATH."/".$phone;
                        if (move_uploaded_file($file_tmp, $path)) {
                            $sql_add_details="INSERT INTO `overseer`(`id`, `qualification`, `certificatePath`,`tId`) VALUES ('$new_user_id','$qualification','$phone',$taluk)";
                        } else {
                            $signUpSuccess=0;
                            echo "Error on Upload-----",$path,'\n';
                        }
                        if (!mysqli_query($conn, $sql_add_details)) {
                            $signUpSuccess=0;
                            echo "Error: " . $sql_add_details . "<br>" . mysqli_error($conn);
                        }
                    }
                    if ($usertype==4) {
                        $path=CERTFICATE_PATH."/".$phone;
                        if (move_uploaded_file($file_tmp, $path)) {
                            $sql_add_details="INSERT INTO `engineer`(`id`, `qualification`, `certificatePath`,`dId`) VALUES ('$new_user_id','$qualification','$phone',$district)";
                        } else {
                            $signUpSuccess=0;
                            echo "Error on Upload-----",$path,'\n';
                        }
                        if (!mysqli_query($conn, $sql_add_details)) {
                            $signUpSuccess=0;
                            echo "Error: " . $sql_add_details . "<br>" . mysqli_error($conn);
                        }
                    }





                    if ($usertype==3) {
                        $sql_add_details="INSERT INTO `contractor`(`cId`, `cLicense`) VALUES ('$new_user_id','$licence')";
                        if (!mysqli_query($conn, $sql_add_details)) {
                            $signUpSuccess=0;
                            echo "Error:in contract " . $sql_add_details . "<br>" . mysqli_error($conn);
                        }
                    }


                    if ($signUpSuccess==1) {
                      
                      
                        header("Location:public/waiting.php");
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                if ($confirm!=$password) {
                    $errMsg=$errMsg."Confirm Password doesn't match\n";
                }
            }
        } else {
            $errMsg=$errMsg."User phone number already used\n";
        }
    }
}


?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Now</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  </head>
  <body class="bg-gray-200">
    <div class="container pt-md-5">
      <div class="row justify-content-center mt-5 ">
        <div class="col-md-10">
          <div class="card shadow-lg">
            <div class="card-body p-0  p-md-0 pr-md-2 rounded-md">
              <div class="row">
                <div
                  class="col-md-4 rounded-md d-flex flex-column justify-content-around align-items-center bg-gradient-primary"
                >
                  <div class="text-white text-center">
                    <h2>PWD4U</h3>
                    <p>Welcomes you</p>
                  </div>
                  <div><a href="login.php" class="text-decoration-none">


                    <button type="button" class="btn btn-primary btn-block bg-white text-primary">Login</button>
                  </a></div>
                </div>
                <div class="col-md-8">
                  <div class="px-2 pt-md-4">
                    <div
                      class="d-flex justify-content-center h3 text-black mb-3"
                    >
                      Register Now
                    </div>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <input
                          type="text"
                          class="form-control"
                          id=""
                          name="name"
                          value="<?php echo $name?>"
                          required
                          placeholder="Name"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <input
                          type="email"
                          required
                          class="form-control rounded-lg"
                          id=""
                          value="<?php echo $email?>"
                          name="email"
                          placeholder="Email"
                        />
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <input
                          type="text"
                          class="form-control"
                          id=""
                          value="<?php echo $phone?>"
                          required
                          name="phone"
                          placeholder="Phone No"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <input
                          type="text"
                          class="form-control"
                          id=""
                          name="address"
                          value="<?php echo $address?>"
                          required
                          placeholder="Address"
                        />
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <input
                          type="password"
                          class="form-control"
                          id=""
                          name="password"
                          value="<?php echo $password?>"
                          required
                          placeholder="Password"
                        />
                      </div>
                      <div class="form-group col-md-6">
                        <input
                          type="password"
                          name="confirm"
                          class="form-control"
                          value="<?php echo $confirm?>"
                          id=""
                          required
                          placeholder="Confirm Password"
                        />
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <select class="form-control"    value="" name="usertype" required onchange="onOptionChange(value)" data-select-option>
                          <option class="hidden" selected value="" disabled>
                            Your are a...
                          </option>
                          <option value="1" <?php if ($usertype==1) {
    echo "selected";
}?>>Public User</option>
                          <option value="2" <?php if ($usertype==2) {
    echo "selected";
}?>>Overseer</option>
                          <option value="3" <?php if ($usertype==3) {
    echo "selected";
}?>>Contractor</option>
                          <option value="4" <?php if ($usertype==4) {
    echo "selected";
}?>>Senior Engineer</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6 d-none" data-district>
                        <select class="form-control"    value="" name="district"   id="district_select">
                          <option class="hidden" selected value="" disabled>
                           District
                          </option>

                          <?php
                          while ($dist=mysqli_fetch_assoc($district_list)) {
                              $dis_id=$dist['id'];
                              $dis_name=$dist['district'];
                              $district==$dis_id?$dis_status='required':$dis_status='';
                              

                              echo "<option value=' $dis_id' $dis_status>$dis_name</option> ";
                          }
                         
                          ?>
                     
                          
                        </select>
                      </div>
                      <div class="form-group col-md-6 d-none" data-taluk>
                        <select class="form-control"    value="" name="taluk"  id="taluk"  >
                          <option class="hidden" selected value="" disabled>
                           Taluk
                          </option>

                         
                     
                          
                        </select>
                      </div>
             

                      <div class="form-group col-md-6 d-none"   data-qualification>
                        <input
                          type="text"
                          class="form-control"
                          id="" 
                          value="<?php echo $qualification?>"
                          name="qualification"
                          placeholder="Qualification"
                        />
                      </div>
                      <div class="form-group col-md-6 d-none"   data-licence>
                        <input
                          type="text" 
                          class="form-control"
                          id="licence"
                          name="licence"
                          value="<?php echo $licence?>"
                          placeholder="Licence Number"
                        />
                      </div>
                   
                    <div class="form-row d-none"  data-certificate>
                      <div class="form-group col-md-6">
                          
                 
                        <label for="">Upload your certificate(PDF only)</label>
                        <input
                          type="file" 
                          class="form-control"
                          id=""
                          name="certificate"
                          placeholder="Certificate"
                          accept="application/pdf"
                        />
                      </div>
                    </div>
            
                    <div class="my-1" style="width: 100%;
    margin-top: 0.25rem;
    font-size: 80%;
    color: #e74a3b;"><?php echo $errMsg?></div>
                    </div>
                    </div>
                    <div class="form-row justify-content-center" >
                      <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-success btn-block bg-gradient-success text-white">Register Now</button>

                      </div>
                 

                    </form>




                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/registration.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <script>




$("#district_select").change(function () {
let id = $('#district_select').val(); //get the current value's option
console.log(id);
$.ajax({
  type: "POST",
  url: "resources/library/getTaluksbasedOnDistrict",
  data: { id: id },
  success: function (data) {
    console.log(data);
    let options = JSON.parse(data);
    for (i = 0; i < options.data.length; i++) {
      $("#taluk").append(`<option value="${options.data[i].id}">
   ${options.data[i].name}
</option>`);
    }
  },
});
});


    </script>
  </body>
</html>
