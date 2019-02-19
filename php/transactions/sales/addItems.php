<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $salesID = $_POST['salesID'];
    $clientControlNo = $_POST['clientControlNo'];
    $prodType = $_POST['prodType'];
    $prodName = $_POST['prodDesc'];
    $itmQty = $_POST['itmQty'];
    $selectedStartDate = $_POST['selectedStartDate'];
    $selectedEndDate = $_POST['expiryDate'];
    $salesTotal = 25;
    $unitPrice = 0;
    $totalItemPrice = 0;
    $update = "no";
    //END RECEVING OF POSTED DATA
    $query = $conn->query("select * from `transactions_sales-items` where `salesID` =".$salesID."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        if($fetch['itemName'] == $prodName){
            $sql = "UPDATE `transactions_sales-items` SET `itemQuantity` = ".$itmQty." WHERE `transactions_sales-items`.`salesItemID` = ".$fetch['salesItemID'].";";
            $result = $conn->query($sql);
            $update = "yes";
        }
    }
    if($update == "no"){
        $inventoryQuery = $conn->query("select * from `inventory` WHERE `prodDesc` = '$prodName'") or die(mysqli_error());
        $inventoryFetch = $inventoryQuery->fetch_array();
        $prodID = $inventoryFetch['prodID'];

        $priceQuery = $conn->query("select * from `products` WHERE `prodID` = '$prodID'") or die(mysqli_error());
        $prodPrice = $priceQuery->fetch_array();
        $itmPrice = $prodPrice['unitPrice'];

        $totalItemPrice = $itmPrice * $itmQty;
        
        $sql = "INSERT INTO `transactions_sales-items` (`salesItemID`, `salesID`, `clientControlNo`, `prodID`,`itemName`, `itemType`, `startDate`, `endDate`, `itemQuantity`, `itemTotalPrice`) VALUES (NULL, '$salesID', '$clientControlNo','$prodID', '$prodName', '$prodType', '$selectedStartDate', '$selectedEndDate', '$itmQty','$totalItemPrice')";
        $result = $conn->query($sql);
    }
    
    $inventoryQuery = $conn->query("SELECT * FROM `inventory` WHERE `prodDesc` = '$prodName'") or die(mysqli_error());
    while($inventoryFetch = $inventoryQuery->fetch_array()){
        $prodStocksUpdate = $inventoryFetch['prodStocks'] - $itmQty;
        $prodOutgoingUpdate = $inventoryFetch['prodOutgoing'] + $itmQty;
        $inventoryItemID = $inventoryFetch['inventoryItemID'];
        $prodID = $inventoryFetch['prodID'];

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
       
        $query = $conn->query("UPDATE `inventory` SET `prodStocks` = '$prodStocksUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
        $query = $conn->query("UPDATE `inventory` SET `prodOutgoing` = '$prodOutgoingUpdate' where `inventoryItemID` = $inventoryItemID") or die(mysqli_error());
        $query2 = $conn->query("SELECT * FROM `transactions_sales-items` ORDER BY `salesItemID` DESC LIMIT 1") or die(mysqli_error());
        while($fetch2 = $query2->fetch_array()){
            $lastSalesItemID = $fetch2['salesItemID'];
            $lastSalesDate = $fetch2['startDate'];
            $query3 = $conn->query("INSERT INTO `inventory_prodoutgoing` (`prodOutgoingID`, `salesItemID`,`prodID`, `prodDesc`, `prodType`, `outgoingDate`, `salesID`, `itemQty`) VALUES (NULL, '$lastSalesItemID', '$prodID', '$prodName', '$prodType', '$lastSalesDate', '$salesID', '$itmQty')") or die(mysqli_error());
        }
    }
    
    $totalPrice = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesID` = $salesID;") or die(mysqli_error());
    $totalPriceFetch = $totalPrice->fetch_array();
    echo $totalPriceFetch['salesTotal'];
?>