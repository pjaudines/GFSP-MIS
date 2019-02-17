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
  <?php
    session_start();
    include "../../php/databaseConn.php";
  ?>
  <script src="../../js/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      
        //SIGN OUT BUTTON
        $("#btnSignOut").click(function(){
           $.ajax({
             url: "../../php/logout.php",
             type: "POST",
             success: function(){
               alert("Signed Out");
               setTimeout(function(){
          location.reload();
                }, 1000);
             }
           });
        });
        //END SIGNOUT

    });
  </script>

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
      require "../requiredPages/pagesNav.php";
      include "../../php/noLoginAccess.php";   
    ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">                    
                <!--INSERT CODE HERE -->
                <button class="btn btn-primary"  data-toggle="modal" data-target="#addNewSupplier" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-account-plus"></i> Add New Supplier</button>
              <div class="card">
                <div class="card-body"> 
                <div class="table-responsive">
                <table class="table datatable" id="dataTable1">
                        <thead>
                                    <tr>
                                    <th style="text-align: center;">Supplier Name</th>
                                            <th style="text-align: center;">E-Mail</th>
                                            <th style="text-align: center;">Contact No.</th>
                                            <th style="text-align: center;">Supplier Address</th>
                                            <th style="text-align: center;">Contact Person</th>
                                            <th style="text-align: center;">Action</th>   
                                    </tr>
                        </thead>
                        <tbody>    
                            <?php
                                require '../../php/databaseConn.php';
                                $query = $conn->query("select * from `suppliers`") or die(mysqli_error());
                                while($fetch = $query->fetch_array()){
                            ?>                   
                                <tr>
                                    <td style="padding: 0;"><?php echo $fetch['supplierName']?></td>
                                    <td style="padding: 0;"><?php echo $fetch['supplierEmail']?></td>
                                    <td style="padding: 0;"><?php echo $fetch['supplierContactNo']?></td>
                                    <td style="padding: 0;"><?php echo $fetch['supplierAddress']?></td>
                                    <td style="padding: 0;"><?php echo $fetch['supplierContactPerson']?></td>
                                    <td style="padding: 0;">
                                        <div class="row">
                                            <button style="margin:0;" type="button" class="btn btn-icons btn-rounded btn-primary" href="#edit<?php echo $fetch['supplierID'];?>" data-target="#edit<?php echo $fetch['supplierID'];?>" data-toggle="modal"><i class='menu-icon mdi mdi-pencil'></i></button>                                                                
                                            <form style="margin:0;" action="../../php/masterfiles/supplier/deleteSupplier.php" method="post" onsubmit="return confirm('Are you sure you want to delete <?php echo $fetch['supplierName']?>?');" >                                                                
                                            <input type="hidden" value="<?php echo $fetch['supplierID']?>" name="supplierID">
                                            <button type="submit" class="btn btn-icons btn-rounded btn-danger"><i class="menu-icon mdi mdi-delete"></i></button>
                                            </form>          
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
        </div>
        <?php
            include "../requiredPages/modals/editSupplierProfile.php";
            include "../requiredPages/modals/addNewSupplierProfile.php";
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
                $('#dataTable1').dataTable();
            });      
    </script>
  <!-- End custom js for this page-->
</body>
</html>