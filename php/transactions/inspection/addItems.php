<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $inspectionID = $_POST['inspectionID'];
    $prodType = $_POST['prodType'];
    $prodName = $_POST['prodName'];
    $itmQty = $_POST['itmQuantity'];
    $txtLocation = $_POST['txtLocation'];
    $selectStatus = $_POST['selectStatus'];
    $update = "no";
    //END RECEVING OF POSTED DATA
    $query = $conn->query("select * from `transactions_inspection-items` where `inspectionID` =".$inspectionID."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        if($fetch['itemName'] == $prodName){
            $sql = "UPDATE `transactions_inspection-items` SET `itemQuantity` = ".$itmQty." WHERE `transactions_inspection-items`.`inspectionItemID` = ".$fetch['inspectionItemID'].";";
            $result = $conn->query($sql);
            $update = "yes";
        }
    }
    if($update == "no"){
        $sql = "INSERT INTO `transactions_inspection-items` (`inspectionItemID`, `inspectionID`, `itemName`, `itemType`, `itemStatus`, `itemQuantity`, `itemLocation`) VALUES (NULL, '$inspectionID', '$prodName', '$prodType', '$selectStatus', '$itmQty', '$txtLocation')";
        $result = $conn->query($sql);
    }
?>