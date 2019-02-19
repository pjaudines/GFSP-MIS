<?php
    include "../../databaseConn.php";
    $clientName = $_POST['clientName'];
    $date = $_POST['maintenanceDate'];
    $currentDate = $_POST['currentDate'];
    $maintenanceID = $_POST['maintenanceID'];
    $sql = "INSERT INTO `transactions_maintenance` (`maintenanceID`, `maintenanceClientName`, `creationDate`, `maintenanceDate`) VALUES ('$maintenanceID', '$clientName', '$currentDate','$date')";
    $result = $conn->query($sql);
    header('Location: ../../../pages/transactions/maintenance.php');
        
?>