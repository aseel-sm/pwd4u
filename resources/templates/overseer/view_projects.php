<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");



     
     $tenders=get_projects_overseer($_SESSION['id']);
    //  var_dump($complaints)
     
     ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
      
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
Projects
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                       

                        <th>ID</th>
                        <th>Status</th>
                        <th>Title</th>
                    
                     
                        <th>Project Report</th>
                        <th>Contractor</th>
                        <th>Action</th>
                  
                        
                      </tr>
                    </thead>
                   
                    <tbody>

                    <?php
                    
                    while ($tender=mysqli_fetch_assoc($tenders))
                     {  
                        $date="";
                          $bidStatus=get_complaint_status($tender['pStatus']);
                          if($tender['pStatus']==9){
                            $date=" on ".convert_timestamp($tender['sdate']);
                            
                          }
                          if($tender['pStatus']==10){
                            $date=" on ".convert_timestamp($tender['cdate']);
                            
                          }
                          $subDate="";
                                                 echo "<tr>
                        <td>".$tender['pid']."</td>"
                        ?>

                      <?php echo "<td>".$bidStatus.$date."</td>
                        <td>".$tender['title']."</td>"?>
                        
                        <td>
                        <a target='_blank' href='../../uploaded_files/reports/<?php echo $tender['initial']?>'><button class='btn btn-primary my-2' type='button'>View</button></a>                        </td>
                    
                        <td>
                        <a target='_blank' href='../../uploaded_files/certificates/<?php echo $tender['certificatePath']?>'><button class='btn btn-primary my-2' type='button'>View</button></a>                        </td>
                    
                    <?php 
                    if($tender['pStatus']==5){
                    ?>
  
  <td>
                        <a href='view_bids.php?project_id=<?php echo $tender['pid']?>'><button class='btn btn-success my-2' type='button'>View Quotes</button></a>                        </td>

                    <?php
                    
                    
                    }
                    else
                    echo "<td>No action </td>"
                    
                    ?>
  






                    <?php    
                       
                   echo  "  </tr>";
                    }
                    ?>

                    </tbody>
                  </table>
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

















