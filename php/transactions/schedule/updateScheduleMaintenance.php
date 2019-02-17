<?php 
    require '../../databaseConn.php';
    $maintenanceID = $_POST['maintenanceID'];
    $clientName = $_POST['clientName'];
    $startDate = $_POST['startDate'];
    $EndDate = $_POST['EndDate'];
    $sql = "SELECT * FROM sched_maintenance WHERE maintenanceID='$maintenanceID'";
    $result = $conn->query($sql);   
        $sql = "UPDATE `sched_maintenance` SET `clientName` = '{$clientName}', `startDate` = '{$startDate}', `EndDate` = '{$EndDate}' WHERE `sched_maintenance`.`maintenanceID` = $maintenanceID";
        $result = $conn->query($sql);
        header('Location: ../../../pages/scheduling/create-maintenance-scheduling.php');

?>