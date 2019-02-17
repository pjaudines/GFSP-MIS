<?php
    $salesItemID = $_POST['salesItemID'];
    $itemQty = $_POST['itemQty'];
    $prodName = $_POST['prodName'];
    include "../../databaseConn.php";    
    $salesID = $_POST['salesID'];
    
    $sql = "DELETE FROM `transactions_sales-items` WHERE `transactions_sales-items`.`salesItemID` = $salesItemID;";
    $result = $conn->query($sql);
    $query1 = $conn->query("DELETE FROM `inventory_prodoutgoing` WHERE `inventory_prodoutgoing`.`salesItemID` = $salesItemID") or die(mysqli_error());
    $inventoryQuery = $conn->query("SELECT * FROM `inventory` WHERE `prodDesc` = '$prodName'") or die(mysqli_error());
    while($inventoryFetch = $inventoryQuery->fetch_array()){
        $prodStocksUpdate = $inventoryFetch['prodStocks'] + $itemQty;
        $prodOutgoingUpdate = $inventoryFetch['prodOutgoing'] - $itemQty;
        $inventoryItemID = $inventoryFetch['inventoryItemID'];
        $query = $conn->query("UPDATE `inventory` SET `prodStocks` = '$prodStocksUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
        if(!$inventoryFetch['prodOutgoing'] < 0){
            $query = $conn->query("UPDATE `in1ventory` SET `prodOutgoing` = '$prodOutgoingUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
        }
    }
    $totalSales = 0;
    $transactionsSalesTotalUpdateQuery = $conn->query("SELECT * FROM `transactions_sales-items` WHERE `transactions_sales-items`.`salesID` = $salesID");
    while($fetch = $transactionsSalesTotalUpdateQuery->fetch_array()){
        $prodID = $fetch['prodID'];
        $itmQty = $fetch['itemQuantity'];
        $priceQuery = $conn->query("SELECT * FROM `products` WHERE `prodID` = $prodID;") or die(mysqli_error());
        while($fetchPrice = $priceQuery->fetch_array()){
            $itemPrice = $fetchPrice['unitPrice'];
        }            
        $totalSales = $totalSales + $itemPrice * $itmQty;
        
    }
    $salesTotalQuery = $conn->query("UPDATE `transactions_sales` SET `salesTotal` = '$totalSales' WHERE `transactions_sales`.`salesID` = $salesID;") or die(mysqli_error);
?>