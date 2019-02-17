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
    function displayEmployees(){
      $.ajax({
          url: "../../php/masterfiles/employee/displayEmployees.php",
          type: "POST",
          success: function(result){
              $("#employeesTable").html(result);
              $('#employeesDataTable').dataTable();
          }
      });
    }
    $(document).ready(function(){
        displayEmployees();
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


        $("#btnAddNewEmployee").click(function(){
            $.ajax({
                url: "../../php/masterfiles/employee/getLastEmployeeNo.php",
                type: "POST",
                success: function(result){
                    var lastEmployeeNo = parseInt(result);
                    $("#employeeNo").val(lastEmployeeNo+1);
                }
            });
            $("#addNewEmployee").modal('show');
        });
        
        //click add
        var employeeNo,employeeID, employeeName, employeeEmail, employeeContactNo, employeePosition,employeeAddress;
        $("#btnAddEmployee").click(function(){
            employeeNo = $("#employeeNo").val();
            employeeID = $("#employeeID").val();
            employeeName = $("#employeeName").val();
            employeeAddress = $("#employeeAddress").val();
            employeeEmail = $("#employeeEmail").val();
            employeeContactNo = $("#employeeContactNo").val();
            employeePosition = $("#employeePosition option:selected").val();
            if(employeeName == "" || employeeName == "" || employeeAddress == "" || employeeEmail == "" || employeeContactNo == "" || employeePosition == "none"){
              $("#requireError").fadeIn();
            }else{
              $("#requireError").hide();

              $("#confirmAdd").fadeIn();
            }
            setTimeout(function(){
              $("#requireError").fadeOut();
            }, 2500);

        });
        //end

        //confirm add
        $("#btnConfirmAdd").click(function(){
          $.ajax({
              url: "../../php/masterfiles/employee/addEmployee.php",
              data: {employeeNo:employeeNo, employeeName:employeeName, employeeAddress:employeeAddress, employeeContactNo:employeeContactNo, employeeEmail:employeeEmail, employeePosition:employeePosition},
              type: "POST",
              success: function(result){
                
                if(result == "fail"){
                  $("#confirmAdd").hide();
                  $("#addFail").fadeIn();
                  setTimeout(function(){
                      $("#addFail").hide();
                }, 2000);
                }else{
                  
                  $("#confirmAdd").hide();
                  $("#addSuccess").fadeIn();
                  
                  setTimeout(function(){
                    $("#addNewEmployee").modal("hide");   
                    
                    $("#employeeNo").val("");
                    $("#employeeName").val("");
                    $("#employeeAddress").val("");
                    $("#employeeContactNo").val("");
                    $("#employeeEmail").val("");
                    $("#employeePosition").val("none");
                    $("#addSuccess").fadeOut();
                  }, 2000);
                  
                  displayEmployees();
                }
              }
            });
        });
        //end

        //cancel confirm
        $("#btbCancelAdd").click(function(){
            $("#confirmAdd").fadeOut();
        });
        //end

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
                <button class="btn btn-primary" id="btnAddNewEmployee" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-account-plus"></i> Add New Employee</button>
                   
              <div class="card">
                <div class="card-body">     
                <div class="table-responsive" id="employeesTable">

                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
            include "../requiredPages/modals/editEmployeeProfile.php";
            include "../requiredPages/modals/addNewEmployeeProfile.php";
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