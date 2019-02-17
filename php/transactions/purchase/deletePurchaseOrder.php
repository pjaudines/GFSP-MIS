<?php
    include "../../databaseConn.php";
    $purchaseID = $_POST['purchaseID'];          
    $sql = "DELETE FROM `transactions_purchaseorders` WHERE `purchaseID` = '$purchaseID'";
    $result = $conn->query($sql);
    $sql = "DELETE FROM `transactions_purchaseorder-items` WHERE `purchaseID` = '$purchaseID'";
    $result = $conn->query($sql);
    header("Location: ../../../pages/transactions/purchases.php");
?>