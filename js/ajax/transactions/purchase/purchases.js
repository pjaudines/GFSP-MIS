//TO DISPLAY PURCHASES
$.ajax({
    url: "../../php/transactions/purchase/displayPurchases.php",
    type: "POST",
    success: function(result){
      $("#purchasesTbl").html(result);
      $('#purchasesDataTable').dataTable();
    }
});
//END

//TO ADD PURCHASE ORDER
$("#addTransactionBtn").click(function(){
var supplierName = $("#supplierName").val();
var paymentTerm = $("#paymentTerm").val();
if(supplierName == "none" || paymentTerm == "none"){ //validation starts here
if(supplierName == "none"){
  $("#addErrorSupplierName").text("(required)");
}else{
  $("#addErrorSupplierName").text("");
}
if(paymentTerm == "none"){
  $("#addErrorPaymentTerm").text("(required)");
}else{
  $("#addErrorPaymentTerm").text("");
}
}
if(supplierName != "none" && paymentTerm != "none"){ //goes here if all the validation are done
$.ajax({
url: "../../php/transactions/purchase/createPurchaseOrder.php",
type: "POST",
data: {supplierName:supplierName, paymentTerm:paymentTerm},
success: function(result){
    alert("Added to database!");
    $.ajax({
      url: "../../php/transactions/purchase/displayPurchases.php",
      type: "POST",                
      success: function(result){
        $("#addNewTransactionPurchase").modal("hide");
        $("#purchasesTbody").html(result);
        $("#addErrorPaymentTerm").text("");//resets error message
        $("#addErrorSupplierName").text("");//resets error message
        
      }
  });
}
});
} //end else

});
//END

//TO DELETE PURCHASE ORDER
$("#btnDeletePO").click(function(){
alert("WEW");
var purchaseID = $("#purchaseID").val();
$.ajax({
url: "../../php/transactions/purchase/deletePurchaseOrder.php",
type: "POST",
data: {purchaseID:purchaseID},
success: function(result){
  alert("Deleted from database!");
  $.ajax({
    url: "../../php/transactions/purchase/test.php",
    type: "POST",                
    success: function(result){      
      $("#purchasesTbody").html(result); 
    }
});
}
});
});
//END
