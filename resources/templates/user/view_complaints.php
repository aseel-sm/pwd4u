<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <?php 
     require_once(realpath(dirname(__FILE__))."/topbar.php");
     
     require_once(realpath(dirname(__FILE__).'/../../library')."/utilities.php");
     
     $complaints=get_complaints_user_id($_SESSION['id'])
     
     
     ?>
     

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"></h1>

            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Given Complaints</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                  <tr>                  <th>ID</th>
  <th>Title</th>
  <th>Date</th>
  <th>Status</th>
</tr>
</thead>
<tbody>


<?php 
while ($complaint=mysqli_fetch_assoc($complaints)) {
  $status=get_complaint_status($complaint['status']);
  $time=convert_timestamp($complaint['createdAt']);
echo "<tr><td>".$complaint['id']."</td><td>".$complaint['title']."</td><td>".$time."</td><td>".$status."</td></tr/>";
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