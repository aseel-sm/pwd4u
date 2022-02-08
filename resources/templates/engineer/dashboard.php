<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");

     $userDis=get_district_by_user_id($_SESSION['id']);

     $eng=eng_dashboard($_SESSION['id'],$userDis);
     
     
     ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
      
          
            <div class="row">
           
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-20 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        New Analysis Reports</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $eng['new_ans'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-20 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Projects Approved</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $eng['project_acc'] ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
         
                


</div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer --> 
      <?php 
     require_once(realpath(dirname(__DIR__))."/footer.php")?>
        <!-- End of Footer -->
      </div>



















