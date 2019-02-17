<?php 
    require '../../databaseConn.php';
    $schedID = $_POST['schedID'];
    $clientName = $_POST['clientName'];
    $startDate = $_POST['startDate'];
    $EndDate = $_POST['EndDate'];
    $sql = "SELECT * FROM sched_inspection WHERE schedID='$schedID'";
    $result = $conn->query($sql);   
        $sql = "UPDATE `sched_inspection` SET `clientName` = '{$clientName}', `startDate` = '{$startDate}', `EndDate` = '{$EndDate}' WHERE `sched_inspection`.`schedID` = $schedID";
        $result = $conn->query($sql);
        header('Location: ../../../pages/scheduling/create-inspection-scheduling.php');

?>