<?php
    include "../../databaseConn.php";
    $deliveryID = $_POST['deliveryID'];    
    $sql = "SELECT * FROM transactions_delivery WHERE deliveryID='$deliveryID'";
    $result = $conn->query($sql);   

    if(!$row = $result->fetch_assoc()){        
        header('Location: ../../../pages/transactions/delivery.php');
    }else{
        $sql = "DELETE FROM `transactions_delivery` WHERE `deliveryID` = '$deliveryID'";
        $result = $conn->query($sql);
        $sql = "DELETE FROM `transactions_delivery-items` WHERE `deliveryID` = '$deliveryID'";
        $result = $conn->query($sql);
        
        header('Location: ../../../pages/transactions/delivery.php');
    }    
?>