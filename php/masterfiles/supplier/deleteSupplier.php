<?php
    include "../../databaseConn.php";
    $supplierID = $_POST['supplierID'];    
    $sql = "SELECT * FROM suppliers WHERE supplierID='$supplierID'";
    $result = $conn->query($sql);   

    if(!$row = $result->fetch_assoc()){        
        header('Location: ../../../pages/masterfiles/supplier.php');
    }else{
        $sql = "DELETE FROM `suppliers` WHERE `suppliers`.`supplierID` = '$supplierID'";
        $result = $conn->query($sql);
        header('Location: ../../../pages/masterfiles/supplier.php');
    }
?>