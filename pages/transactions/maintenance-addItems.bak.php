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
    $maintenanceID = $_POST['maintenanceID'];    
  ?>
<script src="../../js/jquery.min.js"></script>
<script>
  //DELETE PURCHASE ORDER
    function deleteMaintenance(a,b){
        var maintenanceItemID = a;
        var maintenanceID = b;        
        $.ajax({
                url: "../../php/transactions/maintenance/deleteMaintenanceItem.php",
                type: "POST",
                data: {maintenanceItemID:maintenanceItemID},
                success: function(result){
                  $("#itemsTbody").load("../../php/transactions/maintenance/displayItems.php", {maintenanceID:maintenanceID}); 
                }
        });
    }
    //END DELETE PURCHASE ORDER

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
                }, 3000);
             }
           });
        });
        //END SIGNOUT

        //DYNAMIC SELECT
        $("#prodType").change(function(){
          var productType = $("#prodType option:selected").val();
          $.post("../../php/transactions/purchase/selectProduct.php",{prodType: productType}, function(data, status){
              $("#products").html(data);
          });
        });
        //DYNAMIC SELECT END

        //LOAD ITEMS TABLE
        var maintenanceID = "<?php echo $maintenanceID?>";
        $.ajax({
                url: "../../php/transactions/maintenance/displayItems.php",
                type: "POST",
                data: {maintenanceID:maintenanceID},
                success: function(result){
                  $("#itemsTbody").html(result);
                  $("#btnDeleteMaintenance").click(function(){})
                }
        });
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
            $.post("../../php/transactions/maintenance/addItems.php",{maintenanceID: maintenanceID, prodType: itmType, prodName: itmName, itmQuantity: itmQty }, function(data, status){
              if(status == "success"){
                //loads table
                $.ajax({
                  url: "../../php/transactions/maintenance/displayItems.php",
                  type: "POST",
                  data: {maintenanceID:maintenanceID},
                  success: function(result){
                    $("#itemsTbody").html(result);
                    $("#btnDeleteMaintenance").click(function(){})
                  }
                });
                //load table end

                //resets all error messages to none
                $("#addErrorItemName").text("");
                $("#addErroritemType").text("");
                $("#addErorItemQuantity").text("");
                $("#products").val('none');
                $("#prodType").val('none');
                $("#itmQty").val('');
                //end reset
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
      require "../requiredPages/masterfileNav.php";      
    ?>
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-3">
            <label> Maintenance No.</label>
                <input type="hidden" value="<?php echo $mainteanceID?>" id="maintenanceID">
                <input type="text" class="form-control" disabled value="<?php echo  $maintenanceID?>">
            </div>  
          </div>
          <div class="row purchace-popup">
          
            <div class="col-12">                 
                <!--INSERT CODE HERE -->          
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12">
                        <button class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal" data-target="#addItem"><i class="menu-icon mdi mdi-plus"></i> Add Items</button>
                            <div class="table-responsive">
                                <table class="table datatable" id="walkInDataTable">
                                    <thead>
                                        <tr>                                        
                                            <th>Item Name</th>
                                            <th>Item Type</th>
                                            <th>Quantity</th>
                                            <th>Action</th>                                       
                                        </tr>
                                    </thead>
                                    <tbody id="itemsTbody">

                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>     	
            </div>
          </div>
        </div>
        <?php            
            include "../requiredPages/modals/addItemsMaintenance.php";
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