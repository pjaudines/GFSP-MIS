<?php
    require '../../php/databaseConn.php';
    $inventoryItemID = $_POST['inventoryItemID'];
    $incomingQuantity = $_POST['incomingQuantity'];
    /* $arrivalDate = $_POST['arrivalDate']; */
    $query = $conn->query("UPDATE `inventory` SET `prodIncoming` = '$incomingQuantity' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
    $query = $conn->query("select * from `inventory` WHERE `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        $prodStocksUpdate = $fetch['prodStocks'] + $incomingQuantity;
        $query = $conn->query("UPDATE `inventory` SET `prodStocks` = '$prodStocksUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
    }
    
?>