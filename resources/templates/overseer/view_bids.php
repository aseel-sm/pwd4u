<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");



     
     $tenders=get_submitted_bid_by_project_id($_GET['project_id']);
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
                        <th>View Contractor</th>
                        <th>Action</th>
                  
                        
                      </tr>
                    </thead>
                   
                    <tbody>

                    <?php
                    
                    while ($bid=mysqli_fetch_assoc($tenders))
                     {  
                       
                      
                        $confirmPath="../../resources/library/confirm_bids.php?p_id=".$bid['projectId']."&status=8&bid_id=".$bid['bidId']."&comp_id=".$bid['comp_id'];
                          $bidStatus=get_complaint_status($bid['status']);
                          $subDate=convert_timestamp($bid['createdAt']);
                 
                                                 echo "<tr>
                        <td>".$bid['bid_description']."</td>"
                        ?>

                      <?php echo "<td>".$bidStatus."</td>
                        <td>".$bid['quoatation']."</td><td>".$bid['duration']."</td><td>".$subDate."</td>"?>
                        
                        <td>
                        <a target='_blank' href='../../uploaded_files/reports/<?php echo $bid['initial']?>'><button class='btn btn-primary my-2' type='button'>View</button></a></td>
                        <td>
                        <a target='_blank' href='../../uploaded_files/certificates/<?php echo $bid['certificatePath']?>'><button class='btn btn-primary my-2' type='button'>View</button></a></td>
                        <td>
                            <button class='btn btn-info' data-toggle='modal' onclick="setConfirmPath('<?php echo $confirmPath ?>')" data-target='#formModel' type='button'>Accept</button>
                     </td>


  






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



<!-- Modal File Upload-->
<div class="modal fade" id="formModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div>

    Are you sure to continue?
     </div>
     
 <a href="" id="cPath"><button  class="btn btn-primary">Yes</button></a>
   
      </div>
   
    </div>
  </div>
</div>
 


<script>



function setConfirmPath(path) {
  
  document.getElementById("cPath").href=path;

}
                </script>

        <!-- Footer --> 
      <?php 
     require_once(realpath(dirname(__DIR__))."/footer.php")?>
        <!-- End of Footer -->
      </div>

















