<?php
    include "../../databaseConn.php";
    $clientName = $_POST['clientName'];
    $creationDate = $_POST['selectedDate'];
    $installationID = $_POST['installationID'];
    $installationStartDate= $_POST['installationStartDate'];
    $sql = "INSERT INTO `transactions_installation` (`installationID`, `installationClientName`, `creationDate`, `installationStartDate`) VALUES ('$installationID', '$clientName', '$creationDate', '$installationStartDate')";
    $result = $conn->query($sql);
?>