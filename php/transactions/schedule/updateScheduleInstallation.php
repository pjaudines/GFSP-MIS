<?php 
    require '../../databaseConn.php';
    $installationID = $_POST['installationID'];
    $clientName = $_POST['clientName'];
    $startDate = $_POST['startDate'];
    $EndDate = $_POST['EndDate'];
    $sql = "SELECT * FROM schedinstallation WHERE installationID='$installationID'";
    $result = $conn->query($sql);   
        $sql = "UPDATE `schedinstallation` SET `clientName` = '{$clientName}', `startDate` = '{$startDate}', `EndDate` = '{$EndDate}' WHERE `schedinstallation`.`installationID` = $installationID";
        $result = $conn->query($sql);
        header('Location: ../../../pages/scheduling/create-installation-scheduling.php');

?>