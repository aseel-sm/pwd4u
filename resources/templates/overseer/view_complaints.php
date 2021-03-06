<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");


     $userTaluk=get_taluk_by_user_id($_SESSION['id']);
     
     $complaints=get_complaints_by_taluk($userTaluk,$_SESSION['id']);
    //  var_dump($complaints)
     
     ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
      
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
               Complaints
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
                        <th>Image</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Analyis Report</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>

                    <?php
                    
                    while ($complaint=mysqli_fetch_assoc($complaints))
                     {  $status=get_complaint_status($complaint['status']);
                         $date=convert_timestamp($complaint['createdAt']);
                         $pathToImage="../../uploaded_files/images/".$complaint['image'];
                     
                         $btn_image="";
                                                 echo "<tr>
                        <td>".$complaint['title']."</td>"
                        ?>
                 <td><button class='btn btn-info' data-toggle='modal' onclick="changeImage('<?php echo $pathToImage ?>')" data-target='#imageModel' type='button'>View</button></td>

                      <?php echo "<td>".$complaint['description']."</td>
                        <td>".$date."</td> <td>".$status."</td>"?>
                        
                        <td>
                        <a target='_blank' href='../../uploaded_files/analysis/<?php echo $complaint['analysis']?>'><button class='btn btn-danger my-2' type='button'>View</button></a>                        </td>

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




<!-- Modal Image-->
<div class="modal fade" id="imageModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Complaint Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <img src="" alt="no-preview" id="imageBox" style="height:100%;width:100%;">
      </div>
   
    </div>
  </div>
</div>



<script>

function changeImage(img) {
  
  document.getElementById("imageBox").src=img;

}


                </script>










