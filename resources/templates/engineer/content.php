<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php")?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->
            <form >
  <div class="form-row">
    <div class="col-md">
      <input type="text" class="form-control" placeholder="First name">
    </div>
    <div class="col-md">
      <input type="text" class="form-control" placeholder="Last name">
    </div>
  </div>
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