<?php
    $purchaseItemID = $_POST['purchaseItemID'];
    $itemQty = $_POST['itemQuantity'];
    $prodName = $_POST['prodName'];
    include "../../databaseConn.php";    
    $sql = "DELETE FROM `transactions_purchaseorder-items` WHERE `transactions_purchaseorder-items`.`purchaseItemID` = $purchaseItemID;";
    $result = $conn->query($sql);
    $query1 = $conn->query("DELETE FROM `inventory_prodincoming` WHERE `inventory_prodincoming`.`purchaseItemID` = $purchaseItemID;") or die(mysqli_error());
    $query = $conn->query("select * from `inventory` WHERE `prodDesc` = '$prodName'") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        $prodStocksUpdate = $fetch['prodStocks'] - $itemQty;
        $prodIncomingUpdate = $fetch['prodIncoming'] + $itemQty;
        $inventoryItemID = $fetch['inventoryItemID'];
        $query = $conn->query("UPDATE `inventory` SET `prodStocks` = '$prodStocksUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
        if(!$fetch['prodIncoming'] < 0){
            $query = $conn->query("UPDATE `inventory` SET `prodIncoming` = '$prodIncomingUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
        }
    }    
?>