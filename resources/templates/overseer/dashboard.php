<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     
     
     
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");
     $userTaluk=get_taluk_by_user_id($_SESSION['id']);
     $overseer=over_dashboard($_SESSION['id'],$userTaluk);
     
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
                                        Complaints Responded</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $overseer['comp_res']?></div>
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
                                        New Complaints</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $overseer['comp_new']?></div>
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
                                        New Tenders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $overseer['new_tender']?></div>
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
                                        Work Done</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $overseer['work_done']?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hammer fa-2x text-gray-300"></i>
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
                                       New Quotations</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $overseer['new_quote']?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-paste fa-2x text-gray-300"></i>
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



















