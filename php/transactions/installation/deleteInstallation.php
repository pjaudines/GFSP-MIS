<?php
    include "../../databaseConn.php";
    $installationID = $_POST['installationID'];    
    $sql = "SELECT * FROM transactions_installation WHERE installationID='$installationID'";
    $result = $conn->query($sql);   

    if(!$row = $result->fetch_assoc()){        
        header('Location: ../../../pages/transactions/installation.php');
    }else{
        $sql = "DELETE FROM `transactions_installation` WHERE `installationID` = '$installationID'";
        $result = $conn->query($sql);
        $sql = "DELETE FROM `transactions_installation-items` WHERE `installationID` = '$installationID'";
        $result = $conn->query($sql);
        
        header('Location: ../../../pages/transactions/installation.php');
    }    
?>