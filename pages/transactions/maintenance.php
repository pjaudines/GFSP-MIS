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
    function displayMaintenance(){
      $.ajax({
        url: "../../php/transactions/maintenance/displayMaintenance.php",
        method: "POST",
        success: function(result){
            $("#maintenanceTable").html(result);
            $("#maintenanceDataTable").dataTable({
              "order": [[ 0, 'desc' ]]
            });
        }
      });
    }
    $(document).ready(function(){

        displayMaintenance();

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
        var day = k.getDate();
        var year = k.getFullYear();
        if(month < 10){
          month = "0"+month;
        }
        if(day < 10){
          day = "0" + day;
        }
        $("#currentDate").val(year+"-"+month+"-"+day);
        var txtCurrentDate = year+"-"+month+"-"+day;
        
        $("#btnAddNewMaintenance").click(function(){
          $.ajax({
              url: "../../php/transactions/maintenance/getLastMaintenanceID.php",
              method: "POST",
              success: function(result){
                var lastMaintenanceID = parseInt(result);
                $("#txtMaintenanceID").val(lastMaintenanceID+1);
              }
          });
          $("#addNewTransactionMaintenance").modal("show");
        });
        var maintenanceID, clientName, selectedDate, maintenanceDate, currentDate;
        $("#btnAddMaintenance").click(function(){
            maintenanceID = $("#txtMaintenanceID").val();
            clientName = $("#clientName").val();
            maintenanceDate = $("#selectedMaintenanceDate").val();
            currentDate = txtCurrentDate;
            if(clientName == "none" || maintenanceDate == ""){
              $("#requireError").fadeIn();
              setTimeout(function(){
                $("#requireError").fadeOut();
              }, 2500);
            }else{
              $("#confirmAdd").fadeIn();
            }
        });
        
        $("#btnConfirmAdd").click(function(){
            $.ajax({
              url: "../../php/transactions/maintenance/createMaintenance.php",
              method: "POST",
              data: {maintenanceID:maintenanceID, clientName:clientName, maintenanceDate:maintenanceDate, currentDate:currentDate},
              success: function(result){
                $("#txtMaintenanceID").val("");
                $("#clientName").val("none");
                $("#selectedMaintenanceDate").val("");
                $("#confirmAdd").hide();
                $("#addSuccess").fadeIn();
                setTimeout(function(){
                    $("#addSuccess").hide();
                    $("#addNewTransactionMaintenance").modal("hide");
                    displayMaintenance();
                }, 2500);
              }
            });
        });

        $("#btnCancelAdd").click(function(){
            $("#confirmAdd").fadeOut();
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
                <button class="btn btn-primary" id="btnAddNewMaintenance" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-account-plus"></i> Add New Maintenance</button>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="maintenanceTable">
                        
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <?php
             include "../requiredPages/modals/addNewTransactionMaintenance.php";
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