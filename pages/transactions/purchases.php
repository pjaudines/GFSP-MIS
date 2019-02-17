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
  <link rel="stylesheet" href="../../css/kei.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/transactions/purchase.js"></script>
  <?php
    session_start();
    include "../../php/databaseConn.php";
    include "../../php/noLoginAccess.php";
  ?>
  <script>
    function displayPurchases(){
      $.ajax({
                url: "../../php/transactions/purchase/displayPurchases.php",
                type: "POST",
                success: function(result){
                  $("#purchasesTbl").html(result);
                  $('#purchasesDataTable').dataTable({
                    "order": [[ 0, 'desc' ]]
                  });
                }
        });
    }
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

        //TO DISPLAY PURCHASES
        displayPurchases();
        //END
        
      $("#addNewPO").click(function(){
          $.ajax({
                  url: "../../php/transactions/purchase/getLastPO.php",
                  type: "POST",
                  success: function(result){
                      var poID = parseInt(result);
                      $("#txtPurchaseID").val(poID+1);
                  }
              });
              
          $("#addNewTransactionPurchase").modal("show");

      });
      //TO ADD PURCHASE ORDER
      var supplierName, paymentTerm;
      $("#addTransactionBtn").click(function(){
          supplierName = $("#supplierName").val();
          paymentTerm = $("#paymentTerm").val();
          

        if(supplierName == "none" || paymentTerm == "none"){ //validation starts here
            $("#requireError").fadeIn();
            setTimeout(function(){
              $("#requireError").fadeOut();
            }, 2500);
        }
        if(supplierName != "none" && paymentTerm != "none"){ //goes here if all the validation are done
            $.ajax({
            url: "../../php/transactions/purchase/createPurchaseOrder.php",
            type: "POST",
            data: {supplierName:supplierName, paymentTerm:paymentTerm},
            success: function(result){
                $("#requireError").hide();
                $("#addSuccess").fadeIn();
                setTimeout(function(){
                  $("#addSuccess").fadeOut();
                  
                  $.ajax({
                  url: "../../php/transactions/purchase/displayPurchases.php",
                  type: "POST",                
                  success: function(result){
                    $("#addNewTransactionPurchase").modal("hide");
                    displayPurchases();
                    $("#addErrorPaymentTerm").text("");//resets error message
                    $("#addErrorSupplierName").text("");//resets error message
                    
                  }
              });
                }, 2500);
            }
        });
        } //end else
      });
      //END

      //TO DELETE PURCHASE ORDER
      $("#btnDeletePO").click(function(){
        var purchaseID = $("#purchaseID").val();
        $.ajax({
          url: "../../php/transactions/purchase/deletePurchaseOrder.php",
          type: "POST",
          data: {purchaseID:purchaseID},
          success: function(result){
              alert("Deleted from database!");
              displayPurchases();
          }
        });
      });
      //END
      
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
                <button class="btn btn-primary" id="addNewPO" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-account-plus"></i> Add New Purchase</button>
                <div class="card">
                    <div class="card-body">
                      <div class="table-responsive" id="purchasesTbl">
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <?php
            include "../requiredPages/modals/addNewTransactionPurchaseOrder.php";
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
  <!-- End custom js for this page-->
</body>
</html>