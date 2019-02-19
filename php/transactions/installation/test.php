<?php
    include "../../databaseConn.php";

    $sql = "INSERT INTO `transactions_installation` (`installationID`, `installationClientName`, `creationDate`, `installationStartDate`) VALUES (NULL, '1', '1', '1')";
    $result = $conn->query($sql);
    
?>