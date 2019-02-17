<script>
//DELETE delivery
  function deleteDelivery(a,b){
      var deliveryItemID = a;
      var deliveryID = b;
      $.ajax({
              url: "../../php/transactions/delivery/deleteDeliveryItem.php",
              type: "POST",
              data: {deliveryItemID:deliveryItemID},
              success: function(result){
                displayItems(deliveryID);
              }
      });
  }
  //END DELETE delivery ORDER

  function displayItems(deliveryID){
    $.ajax({
              url: "../../php/transactions/delivery/displayItems.php",
              type: "POST",
              data: {deliveryID:deliveryID},
              success: function(result){
                $("#itemsTbl").html(result);
                $("#itemsTable").dataTable();
              }
      });
  }

  $(document).ready(function(){
   
      //DYNAMIC SELECT
      $("#prodType").change(function(){
        var productType = $("#prodType option:selected").val();
        $.post("../../php/transactions/delivery/selectProduct.php",{prodType: productType}, function(data, status){
            $("#products").html(data);
        });
      });
      //DYNAMIC SELECT END

      //LOAD ITEMS TABLE
      var deliveryID = <?php echo $deliveryID?>;
      displayItems(deliveryID);
      //END

      //ADD ITEMS
      $("#btnAddItem").click(function(){
        var itmType =  $("#prodType option:selected").val();
        var itmName =  $("#products option:selected").val();
        var itmQty = $("#itmQty").val();
       
        if(itmType == "none" || itmName == "none" || itmQty < 1){//start validation
          if(itmQty < 1){
            $("#addErorItemQuantity").text("(must not be 0 or less than 0)");
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

          $.post("../../php/transactions/delivery/addItems.php",{deliveryID: deliveryID, prodType: itmType, prodName: itmName, itmQuantity: itmQty }, function(data, status){
            if(status == "success"){
              displayItems(deliveryID);
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