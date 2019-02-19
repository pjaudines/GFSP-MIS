<?php
    require '../../databaseConn.php';
    $query = $conn->query("SELECT * from `transactions_sales` WHERE `salesID` = ".$_POST['salesID']."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
?>

<div class="col-sm-1">
    <label>
        Sales ID
    </label>
    <input type="text" id="txtSalesID" disabled class="form-control" value="<?php echo $fetch['salesID']?>">
</div>
<div class="col-sm-4" style="margin-bottom: 20px;">                 
    <label>
            Client
    </label>
    <input type="text" id="txtClientName" disabled class="form-control" value="<?php echo $fetch['clientName']?>">
    </div>     
    <div class="col-sm-3">
    <label>Payment Term</label>
    <input type="text" id="txtPaymentTerm" disabled class="form-control" value="<?php echo $fetch['Terms']?>">
    </div>
    <div class="col-sm-2">
        <label>Date Created</label>
        <input type="text" id="txtCreationDate" disabled class="form-control" value="<?php echo $fetch['salesDate']?>">
    </div>
    <div class="col-sm-2">
        <label>Total</label>
        <input type="text" id="txtTotal" disabled class="form-control" value="<?php echo $fetch['salesTotal']?>">
    </div>     

<?php
    }
?>