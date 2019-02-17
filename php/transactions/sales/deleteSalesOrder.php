<?php
    include "../../databaseConn.php";
    $salesID = $_POST['salesID'];          
    $sql = "DELETE FROM `transactions_sales` WHERE `salesID` = '$salesID'";
    $result = $conn->query($sql);
    $sql = "DELETE FROM `transactions_sales-items` WHERE `salesID` = '$salesID'";
    $result = $conn->query($sql);
    header("Location: ../../../pages/transactions/sales.php");
?>