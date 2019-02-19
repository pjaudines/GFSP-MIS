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
    include "../../php/noLoginAccess.php";
  ?>

  <script>

    function displayDeliveries(){
        $.ajax({
            url: "../../php/transactions/delivery/displayDeliveries.php",
            method: "POST",
            success: function(result){
              $("#deliveriesTable").html(result);
              $("#deliveriesDataTable").dataTable({
                "order": [[ 0, 'desc' ]]
              });
            }
        });
    }

    $(document).ready(function(){

      $('.select2').select2({
        theme: "bootstrap"
      });

        displayDeliveries();
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

        $("#btnAddNewDelivery").click(function(){
            $.ajax({
              url: "../../php/transactions/delivery/getLastDeliveryID.php",
              method: "POST",
              success: function(result){
                  var lastDeliveryID = parseInt(result);
                  $("#txtDeliveryID").val(lastDeliveryID+1);
              }
            })
            $("#addNewTransactionDelivery").modal("show");
        });

        var clientName, scheduleDate, salesID;
        $("#btnAddDelivery").click(function(){
          clientName = $("#selectClientName option:selected").val();
          scheduleDate = $("#deliveryDate").val();
          salesID = $("#selectSalesID option:selected").val();
          if(clientName == "none" || scheduleDate == "" || salesID == "none"){
              $("#requireError").fadeIn();
              setTimeout(function(){
                $("#requireError").fadeOut();
              }, 2500);
          }else{
            $("#requireError").hide();
            $("#confirmAdd").fadeIn();
          }
          
        });

        $("#btnConfirmAdd").click(function(){
          $.ajax({
              url: "../../php/transactions/delivery/createDelivery.php",
              method: "POST",
              data: {clientName:clientName, scheduleDate:scheduleDate, salesID:salesID},
              success: function(result){
                displayDeliveries();
                
                $("#addNewTransactionDelivery").modal("hide");
              }
          });
        });

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
                <button class="btn btn-primary" id="btnAddNewDelivery" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-account-plus"></i> Add New Delivery</button>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="deliveriesTable">
                        
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <?php
             include "../requiredPages/modals/addNewTransactionDelivery.php";
            include "../requiredPages/modals/editPurchaseOrder.php";
            include "../requiredPages/modals/addClientProfile.php";
            include "../requiredPages/modals/addItemsPurchaseOrder.php";
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
                $('#walkInDataTable').dataTable({
                  "order": [[ 0, 'desc' ]]
                });
            });      
    </script>
  <!-- End custom js for this page-->
</body>
</html>