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
    include "../../php/noLoginAccess.php";
    
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

            var k = new Date();
            var month = k.getMonth()+1;
            var year = k.getFullYear();
            var day = k.getDate();
            if(month < 10){
                month = "0"+month;
            }
            if(day < 10){
                day = "0"+day;
            }
            $("#currentDate").val(year+"-"+day+"-"+month);
    });

  </script>

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
                <div class="row">
                
                <form role="form" class="form-horizontal" method="post" action="../../php/reports/deliveryExportPDF.php" enctype="multi-part/form-data">
                <input type="hidden" value="<?php echo $_SESSION['userOwner']?>" name="user">
                <input type="hidden" id="currentDate" value="" name="currentDate">
                <button type="submit" name="submit" class="btn btn-primary" style="margin-bottom: 20px; margin-right: 10px; margin-left: 10px;"></i>Export to PDF</button>
                </form>
                
                <form role="form" class="form-horizontal" method="post" action="../../php/reports/deliveryIndex.php" enctype="multi-part/form-data">
                
                <button type="submit" name="submit1" class="btn btn-primary" style="margin-bottom: 20px;"></i>Go to Chart</button>
                </form>
               
                </div>
               
                <div class="card">
                  <div class="card-body"> 
                  <div class="table-responsive">
                    <table class="table datatable" id="walkInDataTable">
                        <thead>
                                    <tr>
                
                                        <th>Client Name</th>
                                        <th>Client Address</th>
                                        <th>Item Name</th>
                                        <th>Item Type</th>
                                        <th>itemQuantity</th>
                                        <th>Date Created</th>

                                    </tr>
                        </thead>
                        <tbody>    
                            <?php
                                require '../../php/databaseConn.php';
                                $query = $conn->query("select * from `transactions_delivery-items`,`transactions_delivery` WHERE `transactions_delivery-items`.deliveryID=transactions_delivery.deliveryID") or die(mysqli_error());
                                while($fetch = $query->fetch_array()){
                            ?>                                      
                                <tr>
                                    
                                    <td><?php echo $fetch['deliveredTo']?></td>
                                    <td><?php echo $fetch['deliveryAddress']?></td>
                                    <td><?php echo $fetch['itemName']?></td>
                                    <td><?php echo $fetch['itemType']?></td>
                                    <td><?php echo $fetch['itemQuantity']?></td>
                                    <td><?php echo $fetch['creationDate']?></td>

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
        </div>
        <?php
  
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