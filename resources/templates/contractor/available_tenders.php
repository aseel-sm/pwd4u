<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");



     
     $tenders=get_tenders_contractor($_SESSION['id']);
    //  var_dump($complaints)
     
     ?>

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
      
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
Availiable Tenders
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

                        <th>District</th>
                        <th>Taluk</th>
                      
                     
                        <th>Project Report</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>

                    <?php
                    
                    while ($tender=mysqli_fetch_assoc($tenders))
                     {  
                       

                 
                                                 echo "<tr>
                        <td>".$tender['title']."</td>"
                        ?>

                      <?php echo "<td>".$tender['district']."</td>
                        <td>".$tender['taluk_name']."</td>"?>
                        
                        <td>
                        <a target='_blank' href='../../uploaded_files/reports/<?php echo $tender['initial']?>'><button class='btn btn-primary my-2' type='button'>View</button></a>                        </td>
<td>
    <a href="bid_tender.php?project_id=<?php echo $tender['projectId']?>&comp_id=<?php echo $tender['cId']?>"><button class='btn btn-info'   type='button'>Bid Now</button></a>
  






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

















