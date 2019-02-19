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
  ?>
  <script src="../../js/jquery.min.js"></script>
<script>
  //DELETE sales ORDER
    function deleteItem(a,b){
        var salesItemID = a;
        var salesID = b;        
        $.ajax({
                url: "../../php/transactions/sales/deletesalesOrderItem.php",
                type: "POST",
                data: {salesItemID:salesItemID},
                success: function(result){
                  displayItems();
                }
        });
    }
    //END DELETE sales ORDER

    //DISPLAY ITEMS TABLE
    function displayItems(){
      $.ajax({
                url: "../../php/inventory/displayItems.php",
                type: "POST",                
                success: function(result){
                  $("#itemsTbl").html(result);
                  $('#itemsTable').dataTable();
                }
        });
    }

    //DISPLAY STOCK CARDS

    function displayStockCards(){
      $.ajax({
                url: "../../php/inventory/displayStockCards.php",
                type: "POST",                
                success: function(result){
                  $("#stockCardsTbl").html(result);
                  $('#stockCardsTable').dataTable();
                }
        });
    }


    //DISPLAY OUT GOING PRODUCTS
    function displayOutgoingProducts(){
      $.ajax({
                url: "../../php/inventory/displayOutgoingProducts.php",
                type: "POST",                
                success: function(result){
                  $("#outgoingProductsTbl").html(result);
                  $('#outgoingProductsTable').dataTable();
                }
        });
    }

    //DISPLAY INCOMING PRODUCTS
    function displayIncomingProducts(){
      $.ajax({
                url: "../../php/inventory/displayIncomingProducts.php",
                type: "POST",                
                success: function(result){
                  $("#incomingProductsTbl").html(result);
                  $('#incomingProductsTable').dataTable();
                }
        });
    }
    
    function getCurrentDate(){
      var d = new Date("Y-M-d");
      var currentMonth = d.getMonth() + 1;
      var currentDay = d.getDate();
      var currentYear = d.getFullYear();
      currentDate = currentYear+"-"+currentMonth+"-"+currentDay;
      
    }

    function addIncomingProdSched(a){
      var arrivalDate = $("#selectedDate").val();
      $.ajax({
                url: "../../php/inventory/addProdIncomingSched.php",
                type: "POST",
                data: {arrivalDate: arrivalDate},
                success: function(result){
                  alert(result);
                }
        });
      
    }

    $(document).ready(function(){

        //LOAD ITEMS TABLE
        var salesID = $("#txtSalesOrderNo").val();
        displayItems();
        displayOutgoingProducts();
        displayIncomingProducts();
        displayStockCards();
        //END
        
        var currentDate, selectedDate;
        getCurrentDate();
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
        $("#selectProdTypeIncoming").change(function(){
          var productType = $("#selectProdTypeIncoming option:selected").val();
          $.post("../../php/inventory/selectProduct.php",{productType: productType}, function(data, status){
              $("#selectProdDescIncoming").html(data);
          });
        });

        $("#selectProdTypeOutgoing").change(function(){
          var productType = $("#selectProdTypeOutgoing option:selected").val();
          $.post("../../php/inventory/selectProduct.php",{productType: productType}, function(data, status){
              $("#selectProdDescOutgoing").html(data);
          });
        });
        //DYNAMIC SELECT END

        

        var getArrivalDate, arrivalDate, arrivalDateYear, arrivalDateMonth, arrivalDateDay;

        //ADD INCOMING PRODUCTS
        $("#btnAddIncoming").click(function(){
            var incomingQuantity = $("#incomingQuantity").val();
            /* var arrivalDate = $("#arrivalDate").val(); */
            var inventoryItemID = $("#selectProdDescIncoming option:selected").val();
            
            $.ajax({
                url: "../../php/inventory/addIncoming.php",
                type: "POST",          
                data: {inventoryItemID:inventoryItemID, incomingQuantity:incomingQuantity},      
                success: function(result){
                  displayItems();
                }
            });
            $("#itemAddIncoming").modal("hide");
        });
        //END

        //ADD OUTGOING PRODUCTS
        $("#btnAddOutgoing").click(function(){
            var outgoingQuantity = $("#outgoingQuantity").val();
            /* var outgoingDate = $("#outgoingDate").val(); */
            var inventoryItemID = $("#selectProdDescOutgoing option:selected").val();
            
            $.ajax({
                url: "../../php/inventory/addOutgoing.php",
                type: "POST",          
                data: {inventoryItemID:inventoryItemID, outgoingQuantity:outgoingQuantity},      
                success: function(result){
                  displayItems();
                }
            });
            $("#itemAddOutgoing").modal("hide");
        });
        //END

        //get arrival date
        $("#arrivalDate").change(function(){
          getArrivalDate = new Date(this);
          arrivalDateYear = getArrivalDate.getFullYear();
          arrivalDateMonth = getArrivalDate.getMonth() + 1;
          arrivalDateDay = getArrivalDate.getDate();
          arrivalDate = arrivalDateYear + "-" +arrivalDateDay+"-"+arrivalDateMonth;
          $("#selectedDate").text(arrivalDateYear+"");
        });

        $("#btnToggleMovementTbl").click(function(){
            $("#inventoryIncomingDiv").fadeOut();
            $("#inventoryOutgoingDiv").fadeOut();
            $("#inventoryMovementDiv").fadeIn();
            $("#stockCardDiv").fadeOut();
        });

        $("#btnToggleIncomingTbl").click(function(){
            $("#inventoryMovementDiv").fadeOut();
            $("#inventoryOutgoingDiv").fadeOut();
            $("#inventoryIncomingDiv").fadeIn();
            $("#stockCardDiv").fadeOut();
        });

        $("#btnToggleOutgoingTbl").click(function(){
            $("#inventoryMovementDiv").fadeOut();
            $("#inventoryIncomingDiv").fadeOut();
            $("#inventoryOutgoingDiv").fadeIn();
            $("#stockCardDiv").fadeOut();
        });

        $("#btnToggleStockCardTbl").click(function(){
            $("#stockCardDiv").fadeIn();
            $("#inventoryMovementDiv").fadeOut();
            $("#inventoryIncomingDiv").fadeOut();
            $("#inventoryOutgoingDiv").fadeOut();
        });

        $("#selectProdType").change(function(){
            var productType = $("#selectProdType option:selected").val();
            $.ajax({
                url: "../../php/inventory/selectProduct.php",
                data: {productType:productType},
                method: "POST",
                success: function(result){
                  $("#selectProduct").html(result);
                }
            });
        });

        $("#selectProduct").change(function(){
           var prodDesc = $("#selectProduct option:selected").text();
          
          $.ajax({
            url: "../../php/inventory/viewStockCard.php",
            data: {prodDesc:prodDesc},
            method: "POST",
            success: function(result){
                alert(result);
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
                <div class="card">
                  <div class="card-body">
                    <button type="button" class="btn btn-success" id="btnToggleMovementTbl">Movement</button>
                    <button type="button" class="btn btn-primary" id="btnToggleIncomingTbl">Incoming Products</button>
                    <button type="button" class="btn btn-danger" id="btnToggleOutgoingTbl">Outgoing Products</button>
                    <button type="button" class="btn btn-warning" id="btnToggleStockCardTbl">Stock Cards</button>
                    
                    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#itemAddOutgoing"><i class="menu-icon mdi mdi-minus"></i></button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemAddIncoming"><i class="menu-icon mdi mdi-plus"></i></button> -->
                    </div>
                </div>
                  <!-- INVENTORY MOVEMENT DIV -->
                  <div class="row" style="margin-top: 10px;">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-body">
                        <!-- INVENTORY MOVEMENT DIV -->
                          <div id="inventoryMovementDiv">
                              <h3>Inventory Movement</h3> <div class="alert alert-danger" style="display:none;" id="reorderPointReached"><center>You have items that needs to be re-supplied!</center></div>
                              <hr>
                              <div class="table-responsive" id="itemsTbl">
                              </div>
                          </div>
                          <!-- INVENTORY MOVEMENT DIV -->
                          <!-- INVENTORY INCOMING DIV -->
                          <div id="inventoryIncomingDiv" style="display: none;">
                              <h3>Incoming Products Table</h3>
                              <hr>
                              <div class="table-responsive" id="incomingProductsTbl">
                              </div>
                          </div> 
                          <input type="hidden" id="selectedDate">
                          <!-- INVENTORY INCOMING DIV -->
                          
                          <!-- INVENTORY OUTGOING DIV -->
                          <div id="inventoryOutgoingDiv" style="display: none;">
                              <h3>Outgoing Products Table</h3>
                              <hr>
                              <div class="table-responsive" id="outgoingProductsTbl">
                              </div>
                          </div>
                          <div id="stockCardDiv" style="display: none;">
                              <h3>Stock Card</h3>
                              <hr>
                                <div class="row">
                                  <div class="col-sm-3">
                                    <select class="form-control" id="selectProdType">
                                      <option value="none">Select Product Type</option>
                                      <?php 
                                           $query = $conn->query("SELECT DISTINCT(prodType) from `inventory`") or die(mysqli_error());
                                           while($fetch = $query->fetch_array()){
                                      ?>
                                            <option value="<?php echo $fetch['prodType']?>"><?php echo $fetch['prodType']?></option>
                                      <?php
                                        }
                                      ?>
                                    </select>
                                  </div>
                                  <div class="col-sm-3">
                                        <select class="form-control" id="selectProduct">
                                            <option value="none">Select Product Type First</option>
                                        </select>
                                  </div>
                                </div>
                              <hr>
                              <div class="table-responsive" id="stockCardsTbl">
                              </div>
                          </div>
                        <!-- INVENTORY OUTGOING DIV -->
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- END OF INVENTORY MOVEMENT DIV -->

            </div>
          </div>
        </div>
        
        <?php       
            //modals            
            include "../requiredPages/modals/itemMovement.php";
            include "../requiredPages/modals/inventoryIncoming.php";
            include "../requiredPages/modals/inventoryOutgoing.php";
            include "../requiredPages/modals/stockCard.php";
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
  <script>
         $(document).ready(function () {
                $('#walkInDataTable').dataTable();             
            });      
    </script>
</body>
</html>