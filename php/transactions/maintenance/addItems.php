<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $maintenanceID = $_POST['maintenanceID'];
    $itmType = $_POST['itmType'];
    $itmName = $_POST['itmName'];
    $itmQty = $_POST['itmQty'];
    $maintenanceType = $_POST['maintenanceType'];
    $update = "no";
    //END RECEVING OF POSTED DATA
    $query = $conn->query("select * from `transactions_maintenance-items` where `maintenanceID` =".$maintenanceID."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        if($fetch['itemName'] == $itmName){
            $itmQty = $itmQty + $fetch['itemQuantity'];
            $sql = "UPDATE `transactions_maintenance-items` SET `itemQuantity` = ".$itmQty." WHERE `transactions_maintenance-items`.`maintenanceItemID` = ".$fetch['maintenanceItemID'].";";
            $result = $conn->query($sql);
            $update = "yes";
        }
    }
    if($update == "no"){
        $sql = "INSERT INTO `transactions_maintenance-items` (`maintenanceItemID`,`maintenanceID`, `maintenanceType`, `itemName`, `itemType`, `itemQuantity`) VALUES (NULL, '$maintenanceID', '$maintenanceType','$itmName', '$itmType', '$itmQty')";
        $result = $conn->query($sql);
    }
?>