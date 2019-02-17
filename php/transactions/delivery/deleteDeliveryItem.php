<?php
    $deliveryItemID = $_POST['deliveryItemID'];
    include "../../databaseConn.php";    
    $sql = "DELETE FROM `transactions_delivery-items` WHERE `transactions_delivery-items`.`deliveryItemID` = $deliveryItemID;";
    $result = $conn->query($sql);

?>