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
    if(!isset($_POST['salesID'])){
      header('Location: sales.php');
    }    
  ?>
  <script src="../../js/jquery.min.js"></script>
<script>
  //DELETE sales ORDER
    function deleteItem(a,b,c,d){
        var salesItemID = a;
        var salesID = b;
        var itemQty = c;
        var prodName = d;
        
        $.ajax({
                url: "../../php/transactions/sales/deletesalesOrderItem.php",
                type: "POST",
                data: {salesItemID:salesItemID, salesID: salesID, itemQty: itemQty, prodName:prodName},
                success: function(result){
                  displayItems(salesID);
                  
                }
        });
    }
    //END DELETE sales ORDER

    //DISPLAY ITEMS TABLE
    function displayItems(salesID){
      $.ajax({
                url: "../../php/transactions/sales/displayItems.php",
                type: "POST",
                data: {salesID:salesID},
                success: function(result){
                  $("#itemsTbl").html(result);
                  $('#itemsTable').dataTable();
                }
        });
    }
    //END DISPLAY ITEM TABLE

    $(document).ready(function(){

        var prodStocksLeft, prodReorderPoint;

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
          $.post("../../php/transactions/sales/selectProduct.php",{prodType: productType}, function(data, status){
              $("#products").html(data);
          });
        });
        //DYNAMIC SELECT END

        $("#products").change(function(){
           var prodName = $("#products option:selected").val();

           $.ajax({// GET STOCKS
                url: "../../php/transactions/sales/getStocks.php",
                type: "POST",
                data: {prodName:prodName},
                success: function(result){
                  prodStocksLeft = parseInt(result);
                }
          });

          $.ajax({ // GET REORDER POINT
                url: "../../php/transactions/sales/getReorderPoint.php",
                type: "POST",
                data: {prodName:prodName},
                success: function(result){
                  prodReorderPoint = parseInt(result);
                }
          });
          
        });

        //LOAD ITEMS TABLE
        var salesID = $("#txtSalesOrderNo").val();
        displayItems(salesID);
        //END

        //ADD ITEMS
        $("#btnAddItem").click(function(){
          var itmType =  $("#prodType option:selected").val();
          var prodDesc =  $("#products option:selected").val();
          var itmQty = $("#itmQty").val();
          var selectedStartDate = $("#selectedDate").val();
          var expiryDate = $("#expiryDate").val();
          var clientControlNo = <?php echo  $_POST['clientControlNo']?>;
          
          if(itmType == "none" || prodDesc == "none" || itmQty < 1 || itmQty > prodStocksLeft || itmQty < prodReorderPoint){//start validation
            if(itmQty < 1){
              $("#addErorItemQuantity").text("(must not be less than 1)");
            }else{  //resets error message
              $("#addErorItemQuantity").text("");
            }
            if(itmQty > prodStocksLeft){
              $("#addErorItemQuantity").text("(There are only "+prodStocksLeft+" left in the stocks)");
            }else{  //resets error message
              if(itmQty < prodReorderPoint){
                $("#addErorItemQuantity").text("(Ordered item is below the reorder point)");
              }else{
                $("#addErorItemQuantity").text("");
              }
            }
            if(itmType == "none"){
              $("#addErroritemType").text("(required)");
            }else{  //resets error message
              $("#addErroritemType").text("");
            }
            if(prodDesc == "none"){
              $("#addErrorItemName").text("(required)");
            }else{  //resets error message
              $("#addErrorItemName").text("");
            }
          }else{ //posting of data
            $.post("../../php/transactions/sales/addItems.php",{salesID: salesID, prodType: itmType, prodDesc: prodDesc, itmQuantity: itmQty, clientControlNo:clientControlNo,selectedStartDate:selectedStartDate,expiryDate:expiryDate}, function(data, status){
              if(status == "success"){
                displayItems(salesID);
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
        <div class="row">
            <div class="col-sm-3">                        

            </div>
          </div>
          <div class="row purchace-popup">
            <div class="col-12">
                
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal" data-target="#addItem"><i class="menu-icon mdi mdi-plus"></i> Add Items</button>
                        <div class="card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-3">
                              <input type="hidden" value="<?php echo $_POST['salesDate']?>" id="selectedDate">
                              <input type="hidden" value="<?php echo $_POST['selectedDateYear']?>" id="selectedDateYear">
                              <input type="hidden" value="<?php echo $_POST['selectedDateMonth']?>" id="selectedDateMonth">
                              <input type="hidden" value="<?php echo $_POST['selectedDateDay']?>" id="selectedDateDay">
                                <label> Sales Order No.</label>
                                <input type="text" class="form-control" disabled value="<?php echo  $_POST['salesID']?>" id="txtSalesOrderNo">
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
            include "../requiredPages/modals/addItemsSalesOrder.php";
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