<?php
    include "../../databaseConn.php";
    $inspectionID = $_POST['inspectionID'];    
    $sql = "SELECT * FROM transactions_inspection WHERE inspectionID='$inspectionID'";
    $result = $conn->query($sql);   

    if(!$row = $result->fetch_assoc()){        
        header('Location: ../../../pages/transactions/inspection.php');
    }else{
        $sql = "DELETE FROM `transactions_inspection` WHERE `inspectionID` = '$inspectionID'";
        $result = $conn->query($sql);
        $sql = "DELETE FROM `transactions_inspection-items` WHERE `inspectionID` = '$inspectionID'";
        $result = $conn->query($sql);
        
        header('Location: ../../../pages/transactions/inspection.php');
    }    
?>