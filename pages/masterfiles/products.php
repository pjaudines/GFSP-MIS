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
    function deleteItem(prodID){     
        $.ajax({
                url: "../../php/masterfiles/products/deleteProduct.php",
                type: "POST",
                data: {prodID:prodID},
                success: function(result){
                  displayItems();
                }
        });
    }
    //END DELETE sales ORDER

    //DISPLAY ITEMS TABLE
    function displayItems(){
      $.ajax({
                url: "../../php/masterfiles/products/displayItems.php",
                type: "POST",
                success: function(result){
                  $("#itemsTbl").html(result);
                  $('#itemsTable').dataTable();
                }
        });
    }

    function displayProducts(){
      $.ajax({
                url: "../../php/masterfiles/products/displayProducts.php",
                type: "POST",                
                success: function(result){
                  $("#productsTbl").html(result);
                  $('#productsTable').dataTable();
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

        //LOAD ITEMS TABLE
        displayItems();
        displayProducts()
        //END

        //DYNAMIC SELECT
        $("#prodType").change(function(){
          var productType = $("#prodType option:selected").val();
          if(productType == "createNew"){
            $("#createNewProductTxt").fadeIn();
          }else{
            $("#createNewProductTxt").fadeOut();
          }
        });

        $("#prodTypeMasterfile").change(function(){
          var productType = $("#prodTypeMasterfile option:selected").val();
          $.post("../../php/masterfiles/products/selectProduct.php",{productType: productType}, function(data, status){
            $("#products").html(data);
          });
        });
        //DYNAMIC SELECT END

        $("#btnShowIndividualProducts").click(function(){
            $("#productsDiv").hide();
            $("#individualProductsDiv").fadeIn();
        });
        $("#btnShowProductNames").click(function(){
            $("#individualProductsDiv").hide();
            $("#productsDiv").fadeIn();
            
        });

        //ADD ITEMS
        $("#btnAddItem").click(function(){
          var productType =  $("#prodType option:selected").val();
          if(productType == "createNew"){
            productType = $("#createNewProductTxt").val();
          }
          var productName =  $("#productName").val();
          var unitPrice = $("#unitPrice").val();
          var itemReorderPoint = $("#itemReorderPoint").val();
          if(productType == "" || productName == "" || unitPrice < 1){//start validation
            if(unitPrice < 1){
              $("#addErrorUnitPrice").text("(must not be 0)");
            }else{  //resets error message
              $("#addErrorUnitPrice").text("");
            }
            if(productType == "none"){
              $("#addErrorProductType").text("(required)");
            }else{  //resets error message
              $("#addErrorProductType").text("");
            }
            if(productName == ""){
              $("#addErrorProductName").text("(required)");
            }else{  //resets error message
              $("#addErrorProductName").text("");
            }
            if(itemReorderPoint  < 5){
              $("#addErrorReorderPoint").text("(Re-Order point must not be less than 5.)");
            }else{
              $("#addErrorReorderPoint").text("");
            }
          }else{ //posting of data

            $.post("../../php/masterfiles/products/addProduct.php",{productType: productType, productName: productName, unitPrice: unitPrice, itemReorderPoint:itemReorderPoint}, function(data, status){
              if(status == "success"){
                  
                $("#addNewProduct").modal("hide");
                //resets all error messages to none
                $("#addErrorProductName").text("");
                $("#addErrorProductType").text("");
                $("#addErrorUnitPrice").text("");
                $("#productName").val("");
                $("#productType").val("");
                $("#unitPrice").val(null);
                //end rest
                displayItems();
              }
          });
          }

        });

        $("#btnAddProductMasterfile").click(function(){
              var prodTypeMasterfile = $("#prodTypeMasterfile option:selected").val();
              var productName = $("#products option:selected").val();
              var textBarcode = $("#textBarcode").val();
              var selectSupplier = $("#selectSupplier option:selected").val();
              var selectClient = $("#selectClient option:selected").val();
              if(prodTypeMasterfile == "none" || productName == "none" || textBarcode == "" || selectSupplier == "none" || selectClient == "none"){
                  $("#requiredFieldsError").fadeIn();
              }else{
                $("#requiredFieldsError").fadeOut();
                $.post("../../php/masterfiles/products/addNewProduct.php",{prodTypeMasterfile: prodTypeMasterfile, productName: productName, textBarcode: textBarcode, selectSupplier:selectSupplier, selectClient:selectClient}, function(data, status){
                    if(status == "success"){
                        alert(data);
                        $("#addNewProductMasterfile").modal('hide');
                        $("#prodTypeMasterfile").val("none");
                        $("#products").html("<option value='none'>Select product type first</option>");
                        $("#textBarcode").val("");
                        $("#selectSupplier").val("none");
                        $("#selectClient").val("none");
                        displayProducts();
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
                  <div class="card">
                        <div class="card-body"> 
                          <button id="btnShowIndividualProducts" class="btn">Show Individual Products</button>
                          <button id="btnShowProductNames" class="btn">Show Product Types</button>
                      </div>
                  </div>
                  <div id="individualProductsDiv">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal" data-target="#addNewProductMasterfile"><i class="menu-icon mdi mdi-plus"></i> Add New Product</button>
                      <div class="card">
                          <div class="card-body"> 
                            <div class="table-responsive" id="productsTbl">

                            </div>
                        </div>
                        </div>
                    </div>
                  </div>
                </div> <!-- END OF INDIVIDUAL PRODUCTS DIV -->

                <div id="productsDiv" style="display: none;">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal" data-target="#addNewProduct"><i class="menu-icon mdi mdi-plus"></i> New Product</button>
                      <div class="card">
                          <div class="card-body"> 
                            <div class="table-responsive" id="itemsTbl">

                            </div>
                        </div>
                        </div>
                    </div>
                  </div>
                </div> <!-- END OF PRODUCTS DIV -->

                
            </div>
          </div>
        </div>
        <?php       
            //modals            
            include "../requiredPages/modals/addNewProduct.php";
            include "../requiredPages/modals/addNewProductMasterfile.php";
            include "../requiredPages/modals/createNewProductType.php";
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