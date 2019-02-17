<?php
    include "../../databaseConn.php";
    $clientName = $_POST['clientName'];
    $date = $_POST['scheduleDate'];
    $salesID = $_POST['salesID'];
    

    $query = $conn->query("SELECT * FROM `transactions_sales` where `salesID` = '$salesID'") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $clientControlNo = $fetch['clientControlNo'];
    $query2 = $conn->query("SELECT * FROM `clients` WHERE `clientControlNo` = $clientControlNo");
    $fetch2 = $query2->fetch_array();
    $clientAddress = $fetch2['clientAddress'];
    
   

    
    
    
    $sql = "INSERT INTO transactions_delivery (deliveredTo, deliveryAddress, creationDate, deliveryDate, salesID) values ('$clientName','$clientAddress', '$date', '0000-00-00', '$salesID')";
    $result = $conn->query($sql);

    $query3 = $conn->query("SELECT * FROM `transactions_delivery` ORDER BY `deliveryID` DESC LIMIT 1");
    $fetch3 = $query3->fetch_array();
    $deliveryID = $fetch3['deliveryID'];

    $query2 = $conn->query("UPDATE `transactions_sales` SET `deliveryID` = '$deliveryID' WHERE `transactions_sales`.`salesID` = $salesID;");

    header('Location: ../../../pages/transactions/delivery.php');

    
    
?>