<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");
     if(!isset($_GET['user_type']))
             $type=1;
     else
        $type=$_GET['user_type'];

     $users=get_not_accepted_users($type);
      // var_dump(mysqli_fetch_assoc($users));

    // echo realpath(dirname(__DIR__)."/../library")
     ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
        <form action="" method="get">
        <div class="form-row">
    <div class="form-group col-md-4">
    <select class="form-control" name="user_type" id="">

    <option <?php if ($type==1) {
    echo "selected";
}?> value="1">Public</option>
<option  <?php if ($type==2) {
    echo "selected";
}?> value="2">Overseer</option>
<option  <?php if ($type==3) {
    echo "selected";
}?> value="3">Contractor</option>
<option  <?php if ($type==4) {
    echo "selected";
}?> value="4">Engineer</option>
</select>
    </div>
    <div class="form-group col-md-6">
 <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
       
        
        </form>
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Not Accepted Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
<?php

if ($type==1) {
    echo "
   <th>ID</th>
   <th>Name</th>
   <th>Phone</th>
   <th>Email</th>
   <th>Action</th>";
}
    
  if ($type==2) {
      echo " <th>ID</th>
   <th>Name</th>
   <th>Phone</th>
   <th>Email</th>
   <th>Taluk</th>
   <th>District</th>
   <th>Qualification</th>
   <th>View Certificate</th>
   <th>Action</th>";
  }
  if ($type==3) {
      echo " <th>ID</th>
  <th>Name</th>
  <th>Phone</th>
  <th>Email</th>
  <th>Licence No</th>
  <th>View Certificate</th>
  <th>Action</th>";
  }
  if ($type==4) {
      echo " <th>ID</th>
  <th>Name</th>
  <th>Phone</th>
  <th>Email</th>
  <th>District</th>
  <th>Qualification</th>
  <th>View Certificate</th>
  <th>Action</th>";
  }

?>
                                                         
                                        </tr>
                                    </thead>
                              
                                    <tbody>
                                    <?php

                                    while ($user=mysqli_fetch_assoc($users)) {
                                        if ($type==1) {
                                            echo "     <tr>
                                   <td>". $user['id']."</td>
                                   <td> ". $user['name']."</td>
                                   <td>". $user['phone']."</td>
                                   <td>". $user['email']."</td>
                                   
                                   <td>
                                
                             ";
                                        }
                                        if ($type==2) {
                                            $cert="<a target='_blank' href='../../uploaded_files/certificates/".$user['certificatePath']."'><button class='btn btn-danger my-2' type='button'>View</button></a>";

                                            echo " <tr>
                                   <td>". $user['id']."</td>
                                   <td> ". $user['name']."</td>
                                   <td>". $user['phone']."</td>
                                   <td>". $user['email']."</td>
                                   <td>". $user['taluk_name']."</td>
                                   <td>". $user['district']."</td>
                                   <td>". $user['qualification']."</td>
                                   <td>". $cert."</td>
                                   <td>
                                
                             ";
                                        }
                                        if ($type==3) {
                                            echo "     <tr>
                                   <td>". $user['id']."</td>
                                   <td> ". $user['name']."</td>
                                   <td>". $user['phone']."</td>
                                   <td>". $user['email']."</td>
                                   <td>". $user['cLicense']."</td>

                                   <td>
                                
                             ";
                                        }
                                        
                                        if ($type==4) {
                                            $cert="<a target='_blank' href='../../uploaded_files/certificates/".$user['certificatePath']."'><button class='btn btn-danger my-2' type='button'>View</button></a>";

                                            echo "     <tr>
                                   <td>". $user['id']."</td>
                                   <td> ". $user['name']."</td>
                                   <td>". $user['phone']."</td>
                                   <td>". $user['email']."</td>
                                  
                                   <td>". $user['district']."</td>
                                   <td>". $user['qualification']."</td>
                                   <td>".$cert."</td>
                                   <td>
                                
                             ";
                                        }
                                        
                                        ?>
<a href="../../resources/library/acceptUser.php?status=1&user=<?php echo $user['id'] ?>&type=<?php echo $user['type']?>"><button class="btn btn-success " type="button">Accept</button></a>
<a href="../../resources/library/acceptUser.php?status=2&user=<?php echo $user['id'] ?>&type=<?php echo $user['type']?>"><button class="btn btn-danger my-2" type="button">Reject</button></a>
<?php


echo "</td>  </tr>";
                                         }
                                    ?>
                                        
                                      
</tbody>
</table>


          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer --> 
      <?php
     require_once(realpath(dirname(__DIR__))."/footer.php")?>
        <!-- End of Footer -->
      </div>


<script>


$(function () {
  $("#accept").on("click", function () {
   const id = $("#accept").val();
    // const currentClass = status == 0 ? "btn-success" : "btn-danger";
    // const newClass = status == 0 ? "btn-danger" : "btn-success";
    // const value = status == 0 ? "Turn Off" : "Turn On";
    // const newStatus = status == 1 ? 0 : 1;
    $.ajax({
      method: "POST",
      url: "../backend/set_status.php",
      data: { id: id, type: "registration" },
    }).done(function (data) {
      console.log(data);
      var result = data;
      if (result == "success") {
        console.log(value);
        $("#set_reg_status")
          .removeClass(currentClass)
          .addClass(newClass)
          .html(value)
          .val(newStatus);
      }
    });
  });
});
    </script>

















