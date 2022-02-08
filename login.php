<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['not_accepted'])){

  if($_SESSION['not_accepted']==true) {

    header("Location:public/waiting.php");
}
}
if (isset($_SESSION['authenticated'])&&isset($_SESSION['user_type'])) {
    if ($_SESSION['user_type']!=$type || $_SESSION['authenticated']!=true) {
        header("Location:public/".$_SESSION['user_type']."/");
    }
}
require_once(realpath(dirname(__FILE__)."//resources/")."/config.php");
 require_once(realpath(dirname(__FILE__)."//resources/library")."/utilities.php");
$errMsg="";
$name =$email="";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $email = test_input($_POST["email"]);
        $user_exist=is_email_used($email);
        $password = test_input($_POST["password"]);
        if ($user_exist==1) {
            $isAuthenticated=authenticate($email, $password, 'users'); //check password and if true, return array(usertype,id) else array(-1)
            $helllo=$isAuthenticated['status'];
        
            if ($isAuthenticated!==false) {
                if ($isAuthenticated['status']==0) {

                  $_SESSION['not_accepted']="true";
                    header("Location:public/waiting.php");
                }
                else{
                            
                $_SESSION['authenticated']="true";
                if ($isAuthenticated['type']==0) {
                    $_SESSION['user_type']="admin";
                }
                if ($isAuthenticated['type']==1) {
                    $_SESSION['user_type']="user";
                }
                if ($isAuthenticated['type']==2) {
                    $_SESSION['user_type']="overseer";
                }
                if ($isAuthenticated['type']==3) {
                    $_SESSION['user_type']="contractor";
                }
                if ($isAuthenticated['type']==4) {
                    $_SESSION['user_type']="engineer";
                }
                $_SESSION['name']=$isAuthenticated['name'];
                $_SESSION['id']=$isAuthenticated['id'];
                setcookie(
                    "id",
                    $isAuthenticated[1],
                    time() + (10 * 365 * 24 * 60 * 60),
                    '/'
                );
            header("Location:public/".$_SESSION['user_type']."/");
                }

    
            } else {
                $errMsg=$errMsg."Wrong Password\n";
            }
        } else {
            $errMsg=$errMsg."User email doesn't exist\n";
        }
    }
}

?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Now</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  </head>
  <body class="bg-gray-200">
    <div class="container pt-md-5">
      <div class="row justify-content-center mt-5 ">
        <div class="col-md-10">
          <div class="card shadow-lg">
            <div class="card-body p-md-0 pr-md-3 rounded-md">
              <div class="row">
                <div
                  class="col-md-4 d-flex flex-column justify-content-around align-items-center bg-gradient-primary"
                >
                  <div class="text-white text-center">
                    <h2>PWD4U</h3>
                    <p>Welcomes you</p>
                  </div>
                  <div><a href="registration.php" class="text-decoration-none">


                    <button type="button" class="btn btn-primary btn-block bg-white text-primary">Register</button>
                  </a></div>
                </div>
                <div class="col-md-8">
                  <div class=" px-2 pt-md-4">
                    <div
                      class="d-flex justify-content-center h3 text-black mb-3"
                    >
                 Login Now
                    </div>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                 

                    <div class="form-row d-flex flex-column justify-content-center align-items-center">
                    <fiv class="col-md-8">
                    <div class="form-group ">
                        <input
                          type="email"
                          class="form-control"
                          id=""
                          value="<?php echo $email?>"
                          required
                          name="email"
                          placeholder="Email"
                        />
                      </div>
                      <div class="form-group ">
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
                    </fiv>
                   
                    </div>

               

                    <div class="form-row">
                    
               

                      <div class="my-1" style="width: 100%;
    margin-top: 0.25rem;
    font-size: 80%;
    color: #e74a3b;"><?php echo $errMsg?></div>
                    </div>
                
    
                    </div>
                    <div class="form-row justify-content-center" >
                      <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-success btn-block bg-gradient-success text-white">Login</button>

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
  </body>
</html>
