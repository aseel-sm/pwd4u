<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");



     
     $tenders=get_submitted_bid_contractor($_SESSION['id']);
    //  var_dump($complaints)
     
     ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
      
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
Submitted Bids
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
                       

                        <th>Desc</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Duration</th>
                        <th>Submission Date</th>
                        <th>Project Report</th>
                  
                        
                      </tr>
                    </thead>
                   
                    <tbody>

                    <?php
                    
                    while ($bid=mysqli_fetch_assoc($tenders))
                     {  
                       
                          $bidStatus=get_complaint_status($bid['status']);
                          $subDate=convert_timestamp($bid['createdAt']);
                 
                                                 echo "<tr>
                        <td>".$bid['bid_description']."</td>"
                        ?>

                      <?php echo "<td>".$bidStatus."</td>
                        <td>".$bid['quoatation']."</td><td>".$bid['duration']."</td><td>".$subDate."</td>"?>
                        
                        <td>
                        <a target='_blank' href='../../uploaded_files/reports/<?php echo $bid['initial']?>'><button class='btn btn-primary my-2' type='button'>View</button></a>                        </td>

  






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

















