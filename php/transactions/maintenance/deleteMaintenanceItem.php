<?php
    $maintenanceItemID = $_POST['maintenanceItemID'];
    include "../../databaseConn.php";    
    $sql = "DELETE FROM `transactions_maintenance-items` WHERE `transactions_maintenance-items`.`maintenanceItemID` = $maintenanceItemID;";
    $result = $conn->query($sql);
?>