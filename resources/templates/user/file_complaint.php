<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php")?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h6 class="h5 mb-4 text-gray-800">File Complaint</h6>
          
            <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTitle">Title</label>
      <input type="email" class="form-control" id="inputTitle" placeholder="Road gutters">
    </div>
 
  </div>

  <div class="form-group">
    <label for="inputDesc">Description</label>
    <input type="text" class="form-control" id="inputDesc" placeholder="Lorem Ipsum">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputImage">Upload image</label>
      <input type="file" class="form-control" id="inputImage">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">File Now</button>
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