<?php
    require '../../php/databaseConn.php';
    $inventoryItemID = $_POST['inventoryItemID'];
    $outgoingQuantity = $_POST['outgoingQuantity'];
    /* $outgoingDate = $_POST['outgoingDate']; */
    $query = $conn->query("UPDATE `inventory` SET `prodOutgoing` = '$outgoingQuantity' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
    $query = $conn->query("select * from `inventory` WHERE `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        $prodStocksUpdate = $fetch['prodStocks'] - $outgoingQuantity;
        $query = $conn->query("UPDATE `inventory` SET `prodStocks` = '$prodStocksUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
    }
    
?>