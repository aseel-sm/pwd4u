<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");



     
     $complaints=get_complaints_for_admin();
    //  var_dump($complaints)
     
     ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
      
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
              Initial Reports to Verify
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
                        <th>Title</th>
                    
                        <th>Description</th>
                        <th>Date</th>
                      
                     
                        <th>Project Report</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>

                    <?php
                    
                    while ($complaint=mysqli_fetch_assoc($complaints))
                     {  
                       $rejectPath="../../resources/library/confirm_report.php?comp_id=".$complaint['id']."&status=4";
                       $confirmPath="../../resources/library/confirm_report.php?comp_id=".$complaint['id']."&status=5";
                         $date=convert_timestamp($complaint['createdAt']);
                         $pathToImage="../../uploaded_files/images/".$complaint['image'];
                     
                         $btn_image="";
                                                 echo "<tr>
                        <td>".$complaint['title']."</td>"
                        ?>

                      <?php echo "<td>".$complaint['description']."</td>
                        <td>".$date."</td>"?>
                        
                        <td>
                        <a target='_blank' href='../../uploaded_files/reports/<?php echo $complaint['initial']?>'><button class='btn btn-primary my-2' type='button'>View</button></a>                        </td>
<td>
    <button class='btn btn-info' data-toggle='modal' onclick="setConfirmPath('<?php echo $confirmPath ?>')" data-target='#formModel' type='button'>Verify</button>
    <button class='btn btn-danger my-2' data-toggle='modal' onclick="setConfirmPath('<?php echo $rejectPath?>')" data-target='#formModel' type='button'>Reject</button>






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










