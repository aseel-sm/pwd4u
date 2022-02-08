<?php 

require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");
$district_list=get_districts()

?>

<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php")?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h6 class="h5 mb-4 text-gray-800">File Complaint</h6>
          
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitle">Title</label>
      <input type="text" name="title"    value="<?php echo $title?>" class="form-control" required id="inputTitle" placeholder="Road gutters">
    </div>  
    <div class="form-group col-md-6">
    <label for="inputTitle">Select District</label>
    <select class="form-control"  required  value="" name="district"   id="district_select">
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
 
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputImage">Upload image</label>
      <input required type="file" class="form-control" name="image" id="inputImage" accept="image/x-png,image/jpeg">
    </div>
    <div class="form-group col-md-6" data-taluk>
    <label for="inputImage">Select Taluk</label>
                        <select required class="form-control"    value="" name="taluk"  id="taluk"  >
                          <option  class="hidden" selected value="" disabled>
                           Taluk
                          </option>
                        </select>
                      </div>
             
  </div>
  <div class="form-group">
    <label for="inputDesc">Description</label>
    <input required type="text"name="desc" class="form-control" id="inputDesc" placeholder="Specify Location etc">
  </div>
 
<div> <?php echo $errMsg?></div>
  <button type="submit" name="submit" class="btn btn-primary">File Now</button>
</form>



























          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer --> 
      <?php 
     require_once(realpath(dirname(__DIR__))."/footer.php")?>
        <!-- End of Footer -->
      </div>