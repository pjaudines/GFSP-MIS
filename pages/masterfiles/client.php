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
    function displayClients(){
      $.ajax({
          url: "../../php/masterfiles/client/displayClients.php",
          type: "POST",
          success: function(result){
              $("#clientsTable").html(result);
              $('#clientsDataTable').dataTable();
          }
      });
    }
    $(document).ready(function(){

        //display
        displayClients();
        
      
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
        
        //ADD BTN
        var clientName, clientAddress, clientContactNo, clientEmail, clientContactPerson, clientType,clientControlNo;
          $("#btnAddClient").click(function(){
            clientControlNo = $("#clientControlNo").val();
            clientName = $("#clientName").val();
            clientAddress = $("#clientAddress").val();
            clientContactNo = $("#clientContactNo").val();
            clientEmail = $("#clientEmail").val();
            clientContactPerson = $("#clientContactPerson").val();
            clientType = $("#clientType option:selected").val();
            if(clientName == "" || clientAddress == "" || clientContactNo == "" || clientEmail == "" || clientContactPerson == "" || clientType == ""){
              $("#requireError").fadeIn();
              $("#confirmAdd").hide();
            }else{
              $("#requireError").hide();
              $("#confirmAdd").fadeIn();
            }

          });

          $("#btnConfirmAdd").click(function(){
            $.ajax({
              url: "../../php/masterfiles/client/addClient.php",
              data: {clientControlNo:clientControlNo, clientName:clientName, clientAddress:clientAddress, clientContactNo:clientContactNo, clientEmail:clientEmail, clientContactPerson:clientContactPerson, clientType:clientType},
              type: "POST",
              success: function(result){
                  if(result == "email not valid" || result == "contact number not valid"){
                      $("#invalidEmail").fadeIn();
                      $("#confirmAdd").hide();
                      setTimeout(function(){
                        $("#invalidEmail").fadeOut();
                      }, 2500);
                  }else{
                    $("#invalidEmail").hide();
                  $("#confirmAdd").hide();
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
                    $("#addNewClient").modal("hide");   
                    
                    $("#clientName").val("");
                    $("#clientAddress").val("");
                    $("#clientContactNo").val("");
                    $("#clientEmail").val("");
                    $("#clientContactPerson").val("");
                    $("#clientType").val("none");
                    $("#addSuccess").fadeOut();
                  }, 2000);
                  displayClients();
                }
                  }
              }
            });
          });
        //END OF ADD BTN

        $("#btbCancelAdd").click(function(){
            $("#confirmAdd").hide();
        });

        $("#btnAddNewClient").click(function(){
            $.ajax({
                url: "../../php/masterfiles/client/getLastClientControlNo.php",
                type: "POST",
                success: function(result){
                    var lastControlNo = parseInt(result);
                    $("#clientControlNo").val(lastControlNo+1);
                }
            });
            $("#addNewClient").modal('show');
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
                <div class="row">
                  <div class="col-sm-2">
                    <button class="btn btn-primary" id="btnAddNewClient" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-account-plus"></i> Add New Client</button>
                  </div>
                  <div class="col-sm-3">
                  
                  </div>
                </div>
                <div class="card">
                  <div class="card-body"> 
                  <div class="table-responsive" id="clientsTable">

                </div>
                </div>
            </div>
            </div>
          </div>
        </div>
        <?php
            include "../requiredPages/modals/editClientProfile.php";
            include "../requiredPages/modals/addClientProfile.php";
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
                $('#clientsDataTable').dataTable();
            });
    </script>
  <!-- End custom js for this page-->
</body>
</html>