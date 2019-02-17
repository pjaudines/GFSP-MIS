<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $purchaseID = $_POST['purchaseID'];
    $prodType = $_POST['prodType'];
    $prodName = $_POST['prodDesc'];
    $itmQty = $_POST['itmQuantity'];
    $update = "no";
    //END RECEVING OF POSTED DATA
    $query = $conn->query("select * from `transactions_purchaseorder-items` where `purchaseID` =".$purchaseID."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        if($fetch['itemName'] == $prodName){
            $itmQty = $itmQty + $fetch['Quantity'];
            $sql = "UPDATE `transactions_purchaseorder-items` SET `Quantity` = ".$itmQty." WHERE `transactions_purchaseorder-items`.`purchaseItemID` = ".$fetch['purchaseItemID'].";";
            $result = $conn->query($sql);
            $update = "yes";
        }
    }
    if($update == "no"){
        $sql = "INSERT INTO `transactions_purchaseorder-items` (`purchaseItemID`, `purchaseID`, `itemName`, `itemType`, `Quantity`) VALUES (NULL, '$purchaseID', '$prodName', '$prodType', '$itmQty')";
        $result = $conn->query($sql);
    }

    $query = $conn->query("select * from `inventory` WHERE `prodDesc` = '$prodName'") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        $prodStocksUpdate = $fetch['prodStocks'] + $itmQty;
        $prodIncomingUpdate = $fetch['prodIncoming'] + $itmQty;
        $inventoryItemID = $fetch['inventoryItemID'];

        $query = $conn->query("UPDATE `inventory` SET `prodStocks` = '$prodStocksUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
        $query = $conn->query("UPDATE `inventory` SET `prodIncoming` = '$prodIncomingUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
        $query2 = $conn->query("SELECT * FROM `transactions_purchaseorder-items` ORDER BY `purchaseItemID` DESC LIMIT 1") or die(mysqli_error());
    while($fetch2 = $query2->fetch_array()){
        $lastPurchaseItemID = $fetch2['purchaseItemID'];
        $query3 = $conn->query("INSERT INTO `inventory_prodincoming` (`prodIncomingID`, `prodID`, `purchaseItemID`, `prodDesc`, `prodType`, `arrivalDate`, `purchaseID`, `itemQty`)VALUES (NULL, '$inventoryItemID', '$lastPurchaseItemID', '$prodName', '$prodType', '', '$purchaseID', '$itmQty')") or die(mysqli_error());
    }
    }
    
    
    
    
?>