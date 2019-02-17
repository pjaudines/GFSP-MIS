<?php
    include "../../databaseConn.php";
    $clientName = $_POST['clientName'];
    $clientEmail = $_POST['clientEmail'];
    $clientContactNo = $_POST['clientContactNo'];
    $clientAddress = $_POST['clientAddress'];
    $clientContactPerson = $_POST['clientContactPerson'];
    $clientType = $_POST['clientType'];
    
    $sql = "SELECT * from `clients` where clientName = '$clientName'";
    while($fetch = $query->fetch_array()){
        if($fetch['clientName'] == $clientName){
            
        }
    }
    
    $sql = "INSERT INTO `clients` (`clientControlNo`, `clientType`, `clientName`, `clientAddress`, `clientContactNo`, `clientEmail`, `clientContactPerson`) VALUES (NULL, '$clientType', '$clientName', '$clientAddress', '$clientContactNo', '$clientEmail', '$clientContactPerson')";
    $result = $conn->query($sql);   
    header('Location: ../../../pages/masterfiles/client.php');
?>