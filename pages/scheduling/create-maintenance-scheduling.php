<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gibrosen Fire Safety Products MIS</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <script src="../../js/jquery.min.js"></script>
  
  <?php
    session_start();
    include "../../php/databaseConn.php";
    
  ?>
 
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
      require "../requiredPages/pagesNav.php";      
    ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
          
            <div class="col-12">                            
                <!--INSERT CODE HERE -->             
                <button class="btn btn-primary" data-toggle="modal" data-target="#addNewScheduleMaintenance" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-account-plus"></i> Add New Schedule of Maintenance</button>
                <div class="table-responsive">
                    <table class="table datatable" id="walkInDataTable">
                        <thead>
                              <tr>
                                  <th>Delivered to</th> 
                                  <!-- <th>Item Name</th>
                                  <th>Item Type</th>     -->
                                  <th>Address</th>
                                  <th>Start Date</th>                      
                                  <th>End Date</th>
                                  <th>Action</th>
                              </tr>
                        </thead>
                        <tbody>    
                        <?php   
                                require '../../php/databaseConn.php';
                                $query = $conn->query("select * from `sched_maintenance`") or die(mysqli_error());
                                while($fetch = $query->fetch_array()){
                            ?>                                      
                                <tr>
                                    <td><?php echo $fetch['clientName']?></td>
                                    <td><?php echo $fetch['scheduleAddress']?></td>
                                    <td><?php echo $fetch['startDate']?></td>
                                    <td><?php echo $fetch['EndDate']?></td>
                                    <td style="padding: 0;">
                                        <div class="row">
                                            <input type="hidden" value="<?php echo $fetch['client']?>"  name="clientName">                                            
                                            <button type="button" data-toggle="modal" data-target="#edit<?php echo $fetch['maintenanceID'];?>" stye="margin:0;" type="button" class="btn btn-icons btn-rounded btn-success"><i class='menu-icon mdi mdi-pencil'></i></button>         
                                        </div>                                                      
                                    </td>
                                </tr>
                            <?php
                                }
                                $conn->close();
                            ?>    
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
        </div>
        <?php
           include "../requiredPages/modals/addNewScheduleMaintenance.php";
           include "../requiredPages/modals/EditScheduleMaintenance.php";
        ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
    <script>
         $(document).ready(function () {
                $('#walkInDataTable').dataTable();             
            });      
    </script>
  <!-- End custom js for this page-->
</body>
</html>