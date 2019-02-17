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
  <?php
    session_start();
    include "../../php/databaseConn.php";
    include "../../php/noLoginAccess.php";
    if(!isset($_POST['clientControlNo'])){
      header('Location: warranty_monitoring.php');
    }
  ?>
  <script src="../../js/jquery.min.js"></script>
<script>
  //DELETE warranty_monitoring ORDER
    function deleteItem(a,b){
        var warranty_monitoringItemID = a;
        var clientControlNo = b;        
        $.ajax({
                url: "../../php/transactions/warranty_monitoring/deletewarranty_monitoringOrderItem.php",
                type: "POST",
                data: {warranty_monitoringItemID:warranty_monitoringItemID},
                success: function(result){
                  displayItems(clientControlNo);
                }
        });
    }
    //END DELETE warranty_monitoring ORDER

    //DISPLAY ITEMS TABLE
    function displayItems(clientControlNo){
      $.ajax({
                url: "../../php/transactions/warranty_monitoring/displayItems.php",
                type: "POST",
                data: {clientControlNo:clientControlNo},
                success: function(result){
                  $("#itemsTbl").html(result);
                  $('#itemsTable').dataTable();
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

        //DYNAMIC SELECT
        $("#prodType").change(function(){
          var productType = $("#prodType option:selected").val();
          $.post("../../php/transactions/warranty_monitoring/selectProduct.php",{prodType: productType}, function(data, status){
              $("#products").html(data);
          });
        });
        //DYNAMIC SELECT END

        //LOAD ITEMS TABLE
        var clientControlNo = $("#txtClientControlNo").val();
        displayItems(clientControlNo);
        //END

        //ADD ITEMS
        $("#btnAddItem").click(function(){
          var itmType =  $("#prodType option:selected").val();
          var itmName =  $("#products option:selected").val();
          var itmQty = $("#itmQty").val();

          if(itmType == "none" || itmName == "none" || itmQty < 1){//start validation
            if(itmQty < 1){
              $("#addErorItemQuantity").text("(must not be 0)");
            }else{  //resets error message
              $("#addErorItemQuantity").text("");
            }
            if(itmType == "none"){
              $("#addErroritemType").text("(required)");
            }else{  //resets error message
              $("#addErroritemType").text("");
            }
            if(itmName == "none"){
              $("#addErrorItemName").text("(required)");
            }else{  //resets error message
              $("#addErrorItemName").text("");
            }
          }else{ //posting of data

            $.post("../../php/transactions/warranty_monitoring/addItems.php",{clientControlNo: clientControlNo, prodType: itmType, prodDesc: itmName, itmQuantity: itmQty }, function(data, status){
              if(status == "success"){
                displayItems(clientControlNo);
                //resets all error messages to none
                $("#addErrorItemName").text("");
                $("#addErroritemType").text("");
                $("#addErorItemQuantity").text("");
                $("#products").html("<option>Select Item type first</option>");
                $("#prodType").val('none');
                $("#itmQty").val('');
                //end rest
                $("#addItem").modal("hide");
              }
          });
          }

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
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <label> Client</label>
                            <input type="text" class="form-control" disabled value="<?php echo  $_POST['clientControlNo']?>" id="txtClientControlNo">
                            <br>
                          </div>
                        </div>
                        <div class="table-responsive" id="itemsTbl">
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <?php
            //modals

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