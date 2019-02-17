<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $prodType = $_POST['productType'];
    $prodName = $_POST['productName'];
    $unitPrice = $_POST['unitPrice'];
    $reorderPoint = $_POST['itemReorderPoint'];
    //END RECEVING OF POSTED DATA
    $sql = "INSERT INTO `products` (`prodID`, `prodType`, `prodDesc`, `unitPrice`) VALUES (NULL, '$prodType', '$prodName', '$unitPrice')";
    $result = $conn->query($sql);
    $query = $conn->query("SELECT * from `products` WHERE `prodDesc` = '$prodName'") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        $prodID = $fetch['prodID'];
        $prodDesc = $fetch['prodDesc'];
        $prodType = $fetch['prodType'];
        $query = $conn->query("INSERT INTO `inventory` (`inventoryItemID`, `prodID`, `prodDesc`, `prodType` , `prodStocks`, `prodIncoming`, `prodOutgoing`, `reorderPoint`) VALUES (NULL, '$prodID', '$prodDesc', '$prodType', '0','', '', '$reorderPoint')") or die(mysqli_error());
    }
?>