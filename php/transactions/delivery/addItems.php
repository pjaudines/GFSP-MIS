<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $deliveryID = $_POST['deliveryID'];
    $prodType = $_POST['prodType'];
    $prodName = $_POST['prodName'];
    $itmQty = $_POST['itmQuantity'];
    $update = "no";
    //END RECEVING OF POSTED DATA
    $query = $conn->query("select * from `transactions_delivery-items` where `deliveryID` =".$deliveryID."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        if($fetch['itemName'] == $prodName){
            $itemQty = $itemQty + $fetch['itemQuantity'];
            $sql = "UPDATE `transactions_delivery-items` SET `itemQuantity` = ".$itmQty." WHERE `transactions_delivery-items`.`deliveryItemID` = ".$fetch['deliveryItemID'].";";
            $result = $conn->query($sql);
            $update = "yes";
        }
    }
    if($update == "no"){
        $sql = "INSERT INTO `transactions_delivery-items` (`deliveryItemID`, `deliveryID`, `itemName`, `itemType`, `itemQuantity`) VALUES (NULL, '$deliveryID', '$prodName', '$prodType', '$itmQty')";
        $result = $conn->query($sql);
    }
?>