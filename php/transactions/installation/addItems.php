<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $installationID = $_POST['installationID'];
    $prodType = $_POST['prodType'];
    $prodName = $_POST['prodName'];
    $itmQty = $_POST['itmQuantity'];
    $update = "no";
    //END RECEVING OF POSTED DATA
    $query = $conn->query("select * from `transactions_installation-items` where `installationID` =".$installationID."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        if($fetch['itemName'] == $prodName){
            $sql = "UPDATE `transactions_installation-items` SET `itemQuantity` = ".$itmQty." WHERE `transactions_installation-items`.`installationItemID` = ".$fetch['installationItemID'].";";
            $result = $conn->query($sql);
            $update = "yes";
        }
    }
    if($update == "no"){
        $sql = "INSERT INTO `transactions_installation-items` (`installationItemID`, `installationID`, `itemName`, `itemType`, `itemQuantity`) VALUES (NULL, '$installationID', '$prodName', '$prodType', '$itmQty')";
        $result = $conn->query($sql);
    }
?>