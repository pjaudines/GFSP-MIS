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
  <link rel="stylesheet" href="src/bootstrap-select.min.css" type="text/css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/kei.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/transactions/sales.js"></script>
  <script src="src/bootstrap-select.min.js"></script>
  <link href="src/select2-bootstrap4.css" rel="stylesheet" />
  <link href="src/select2-bootstrap4.min.css" rel="stylesheet" />
  <script src="src/select2.min.js"></script>

  <?php
    session_start();
    include "../../php/databaseConn.php";
    include "../../php/noLoginAccess.php";
  ?>
  <script>
  
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

    function displaySales(){
        $.ajax({
                url: "../../php/transactions/sales/displaySalesOrder.php",
                type: "POST",
                success: function(result){
                  $("#salesTbl").html(result);
                  $('#salesTable').dataTable({
                    "order": [[ 0, 'desc' ]]
                  });
                }
        });
    }
    $(document).ready(function(){

      

      $("#products").change(function(){ //GET STOCKS AND REORDER POINT
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

      $("#prodType").change(function(){
          var productType = $("#prodType option:selected").val();
          $.post("../../php/transactions/sales/selectProduct.php",{prodType: productType}, function(data, status){
              $("#products").html(data);
          });
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

        //TO DISPLAY salesS
       displaySales();
        //END

      //GET DATE
        $("#selectDate").change(function(){
            var startDate = new Date(this.value);
            var month = startDate.getMonth()+1;
            var year = startDate.getFullYear();
            var day = startDate.getDate();
            $("#selectedDate").val(year+"-"+month+"-"+day);
        });
      //END
      $('.select2').select2({
        theme: "bootstrap"
      });
      var tempSalesID;
      $("#btnAddNewSales").click(function(){
        $.ajax({
                url: "../../php/transactions/sales/getLastSalesOrderNo.php",
                type: "POST",
                success: function(result){
                    var salesID = parseInt(result);
                    salesID = salesID + 1;
                    $("#txtSalesID").val(salesID);
                    
                    displayItems(salesID);
                }
            });
        $("#addNewTransactionSales").modal("show");
        
      });

      var salesID, clientName, paymentTerm, selectedDate, clientControlNo,selectedDate;
      $("#addTransactionBtn").click(function(){
        salesID = $("#txtSalesID").val();
        clientName = $("#clientName option:selected").text();
        clientControlNo = $("#clientName option:selected").val();
        paymentTerm = $("#paymentTerm option:selected").val();
        selectedDate = $("#selectDate").val();
        if(clientControlNo == "none" || paymentTerm == "none" || selectedDate == ""){
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
            url: "../../php/transactions/sales/createSalesOrder.php",
            type: "POST",
            data: {salesID:salesID, clientName:clientName, clientControlNo:clientControlNo, paymentTerm:paymentTerm,selectedDate:selectedDate},
            success: function(result){
                $("#confirmAdd").hide();
                $("#addSuccess").fadeIn();
                setTimeout(function(){
                  $("#addSuccess").fadeOut();
                  $("#addNewTransactionSales").modal("hide");
                  displaySales();
                $("#addErrorPaymentTerm").text("");//resets error message
                $("#addErrorClientName").text("");//resets error message
                }, 2500);
               
            }
        });
      });

      $("#btnCancelAdd").click(function(){
        $("#confirmAdd").fadeOut();
      });

      $("#btnAddItem").click(function(){
        
        var itmType =  $("#prodType option:selected").val();
          var prodDesc =  $("#products option:selected").val();
          var itmQty = $("#itmQty").val();
          var selectedStartDate = $("#selectedDate").val();
          var expiryDate = $("#expiryDate").val();
          var clientControlNo = $("#clientName option:selected").val();
          var salesID = $("#txtSalesID").val();
          
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
            $.post("../../php/transactions/sales/addItems.php",{salesID: salesID, prodType: itmType, prodDesc: prodDesc, itmQty: itmQty, clientControlNo:clientControlNo,selectedStartDate:selectedStartDate,expiryDate:expiryDate}, function(data, status){
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
            <div class="col-12">
            <button class="btn btn-primary" id="btnAddNewSales" style="margin-bottom: 20px;"><i class="menu-icon mdi mdi-account-plus"></i> Add New Sales Transaction</button>                
                <!--INSERT CODE HERE -->
              <div class="card">
                <div class="card-body"> 
                  <div class="table-responsive" id="salesTbl">
                  </div>
                </div>
              </div>
            </div>          
        </div>
        <?php
            //MODALS
            include "../requiredPages/modals/addNewTransactionSalesOrder.php";
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