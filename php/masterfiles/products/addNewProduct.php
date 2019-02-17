<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $prodType = $_POST['prodTypeMasterfile'];
    $prodName = $_POST['productName'];
    $textBarcode = $_POST['textBarcode'];
    $soldTo = $_POST['selectClient'];
    $boughtFrom = $_POST['selectSupplier'];
    //END RECEVING OF POSTED DATA
    $sql = "INSERT INTO `products_masterfile` (`itemID`, `prodCode`, `prodName`, `prodType`, `soldTo`, `boughtFrom`) VALUES (NULL, '$textBarcode', '$prodName', '$prodType', '$soldTo', '$boughtFrom')";
    $result = $conn->query($sql);
    
    
?>