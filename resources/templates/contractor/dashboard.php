<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");

     $cont=cont_dashboard($_SESSION['id']);
     
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
                                       Availiable Tenders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cont['avail']?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hard-hat fa-2x text-gray-300"></i>
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
                                       Submmitted Bids</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cont['sub']?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-paste fa-2x text-gray-300"></i>
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
                                       Bidden Tenders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cont['bidden']?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hammer fa-2x text-gray-300"></i>
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



















