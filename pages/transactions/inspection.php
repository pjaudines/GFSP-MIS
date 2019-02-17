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
  <link href="src/select2-bootstrap4.css" rel="stylesheet" />
  <link href="src/select2-bootstrap4.min.css" rel="stylesheet" />
  <script src="src/select2.min.js"></script>
  
  <?php
    session_start();
    include "../../php/databaseConn.php";
    include "../../php/noLoginAccess.php";
    
  ?>
 <script>

  function displayInspection(){
    $.ajax({
      url: "../../php/transactions/inspection/displayInspectionOrders.php",
      type: "POST",
      success: function(result){
        $("#inspectionOrdersTable").html(result);
        $("#inspectionOrdersDataTable").DataTable({
          "order": [[ 0, 'desc' ]]
        });
      }
    });
  }

 $(document).ready(function(){
   displayInspection();

  $('.select2').select2({
        theme: "bootstrap"
      });
 
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
    
    $("#btnAddNewInspection").click(function(){
      $("#addNewTransactionInspection").modal("show");
      $.ajax({
          url: "../../php/transactions/inspection/getLastInspectionNo.php",
          type: "POST",
          success: function(result){
              var lastInspectionNo = parseInt(result);
              $("#txtInspectionID").val(lastInspectionNo+1);
          }
        });
    });

    var inspectionID, clientName,selectedDate, inspectionDate;
    $("#btnCreate").click(function(){
      inspectionID = $("#txtInspectionID").val();
      clientName = $("#selectClientName option:selected").val();
      selectedDate = $("#selectedDate").val();
      inspectionDate = $("#inspectionDate").val();
      if(clientName == "none" || inspectionDate == ""){
        $("#requireError").fadeIn();
        setTimeout(function(){
          $("#requireError").fadeOut();
        },2500);
      }else{
        $("#confirmAdd").fadeIn();
        $("#requireError").hide();
      }
      
      $("#btnConfirmAdd").click(function(){
        $("#confirmAdd").hide();
        $.ajax({
          url: "../../php/transactions/inspection/createInspection.php",
          data: {inspectionID:inspectionID, clientName:clientName, selectedDate:selectedDate,inspectionDate:inspectionDate},
          type: "POST",
          success: function(result){
            $("#addSuccess").fadeIn();
            setTimeout(function(){
              $("#addNewTransactionInspection").modal("hide");
            $("#txtInspectionID").val("");
            $("#selectClientName").val("none");
            $("#inspectionDate").val("");
            $('.select2').select2({
              theme: "bootstrap"
            });
            $("#addSuccess").hide();
            displayInspection();
            }, 2500);
          }
        });
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
                <button class="btn btn-primary" id="btnAddNewInspection" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-account-plus"></i> Add New Inspection</button>
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive" id="inspectionOrdersTable">
                        
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <?php
           include "../requiredPages/modals/addNewTransactionInspection.php";
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
                  
                });             
            });      
    </script>
  <!-- End custom js for this page-->
</body>
</html>