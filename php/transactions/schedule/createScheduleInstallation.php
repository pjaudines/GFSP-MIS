<?php
    include "../../databaseConn.php";
    $clientName = $_POST['clientName'];
    $startDate = $_POST['startDate'];
    $EndDate = $_POST['EndDate'];
    $Duration = $_POST['Duration'];
    $clientAddress = "";
    $query = $conn->query("SELECT * FROM `clients` where `clientName` = '$clientName'") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        $clientAddress = $fetch['clientAddress'];
    }
    $sql = "INSERT INTO `schedinstallation`( `installationID`,`clientName`, `startDate`, `EndDate`, `Duration`, `scheduleAddress`) VALUES (NULL, '$clientName', '$startDate', '$EndDate', '$Duration', '$clientAddress')";
    $result = $conn->query($sql);
    header('Location: ../../../pages/scheduling/create-installation-scheduling.php');
?>  