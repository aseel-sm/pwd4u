<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");



     
     $tenders=get_bidden_contractor($_SESSION['id']);
    //  var_dump($complaints)
     
     ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
      
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
Bidden Tenders
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
                        <th>Update Work Status</th>
                  
                        
                      </tr>
                    </thead>
                   
                    <tbody>

                    <?php
                    
                    while ($bid=mysqli_fetch_assoc($tenders)) {
                        $bidStatus=get_complaint_status($bid['status']);
                        $subDate=convert_timestamp($bid['createdAt']);
                        if($bid['status']==8)
                        {
                          $next="Stared";
                          $newStatus=9;
                        }
                        else if($bid['status']==9)
                        {
                          $next="Completed";
                          $newStatus=10;
                        }
                        else
                        $next="NIL";
                        $newStatus="";

                        $confirmPath="../../resources/library/update_work_status.php?status=".$newStatus."&bid_id=".$bid['bidId']."&comp_id=".$bid['compId'];
                        echo "<tr>
                        <td>".$bid['bid_description']."</td>"
                        ?>

                      <?php echo "<td>".$bidStatus."</td>
                        <td>".$bid['quoatation']."</td><td>".$bid['duration']."</td><td>".$subDate."</td>"?>
                        
                        <td>
                        <a target='_blank' href='../../uploaded_files/reports/<?php echo $bid['initial']?>'><button class='btn btn-primary my-2' type='button'>View</button></a>                        </td>

  
                        <td>


<?php if($next=="NIL")
{
  echo "Work Completed";

}
else
{
    ?>
                        <a  href='<?php echo $confirmPath?>'><button class='btn btn-primary my-2' type='button'><?php echo $next?></button></a> </td>





                    <?php
}        
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

















