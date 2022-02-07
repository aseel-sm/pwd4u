<?php 

require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");
$tender=get_tenders_by_id($_GET['project_id'])

?>

<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php")?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h6 class="h5 mb-4 text-gray-800">Bid Tender</h6>
          
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?project_id=$projectId&comp_id=$compId";?>" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitle">Duration</label>
      <input type="text" name="duration"    value="<?php ?>" class="form-control" required id="inputTitle" placeholder="In days">
    </div>  
    <div class="form-group col-md-6">
  
    <label for="inputTitle">Amount</label>
      <input type="text" name="amount"    value="<?php ?>" class="form-control" required id="inputTitle" placeholder="Rs ">           

                      
    </div>  
 
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputImage">Start Date</label>
      <input required type="date" class="form-control" required name="star_date">
    </div>
    <div class="form-group col-md-6" >
    
                      </div>
             
  </div>
  <div class="form-group">
    <label for="inputDesc">Description</label>
    <input required type="text"name="desc" class="form-control" id="inputDesc" placeholder="Specify you comments">
  </div>
 
<div> <?php echo $errMsg?></div>
  <button type="submit" name="submit" class="btn btn-primary">Bid Now</button>
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