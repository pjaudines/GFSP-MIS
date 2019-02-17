<?php 
    require '../../databaseConn.php';
    $schedDeliveryID = $_POST['schedDeliveryID'];
    $clientName = $_POST['clientName'];
    $startDate = $_POST['startDate'];
    $EndDate = $_POST['EndDate'];
    $sql = "SELECT * FROM sched_delivery WHERE schedDeliveryID='$schedDeliveryID'";
    $result = $conn->query($sql);   
        $sql = "UPDATE `sched_delivery` SET `clientName` = '{$clientName}', `startDate` = '{$startDate}', `EndDate` = '{$EndDate}' WHERE `sched_delivery`.`schedDeliveryID` = $schedDeliveryID";
        $result = $conn->query($sql);
        header('Location: ../../../pages/scheduling/create-delivery-scheduling.php');

?>