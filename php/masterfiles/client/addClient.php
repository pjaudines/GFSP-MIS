<?php
    include "../../databaseConn.php";
    $clientControlNo = $_POST['clientControlNo'];
    $clientName = $_POST['clientName'];
    $clientEmail = $_POST['clientEmail'];
    $clientContactNo = $_POST['clientContactNo'];
    $clientAddress = $_POST['clientAddress'];
    $clientContactPerson = $_POST['clientContactPerson'];
    $clientType = $_POST['clientType'];
    $sql = "SELECT * from `clients` where `clientName` = '$clientName'";
    
    if (!filter_var($clientEmail, FILTER_VALIDATE_EMAIL) || !filter_var($clientEmail, FILTER_VALIDATE_INT)) {
        if(!filter_var($clientEmail, FILTER_VALIDATE_EMAIL)){
            echo("email not valid");
         }
         if(!filter_var($clientEmail, FILTER_VALIDATE_INT)){
            echo("contact number not valid");
         }
         if(!filter_var($clientEmail, FILTER_VALIDATE_EMAIL) && !filter_var($clientEmail, FILTER_VALIDATE_INT)){
            echo("email and contact number not valid");
         }
         
        
    }else{
        if(mysqli_num_rows($result = $conn->query($sql))){
            echo "fail";
        }else{
            $sql = "INSERT INTO `clients` (`clientControlNo`, `clientType`, `clientName`, `clientAddress`, `clientContactNo`, `clientEmail`, `clientContactPerson`) VALUES ('$clientControlNo', '$clientType', '$clientName', '$clientAddress', '$clientContactNo', '$clientEmail', '$clientContactPerson')";
            $result = $conn->query($sql);   
            echo "Added to database!";
        }
    }
    
?>