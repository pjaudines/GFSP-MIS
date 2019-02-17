<?php
    include "../../databaseConn.php";
    $maintenanceID = $_POST['maintenanceID'];    
    $sql = "SELECT * FROM transactions_maintenance WHERE maintenanceID='$maintenanceID'";
    $result = $conn->query($sql);   

    if(!$row = $result->fetch_assoc()){        
        header('Location: ../../../pages/transactions/maintenance.php');
    }else{
        $sql = "DELETE FROM `transactions_maintenance` WHERE `maintenanceID` = '$maintenanceID'";
        $result = $conn->query($sql);
        $sql = "DELETE FROM `transactions_maintenance-items` WHERE `maintenanceID` = '$maintenanceID'";
        $result = $conn->query($sql);
        
        header('Location: ../../../pages/transactions/maintenance.php');
    }    
?>