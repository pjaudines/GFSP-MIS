<?php    
    include "../../databaseConn.php";
    $clientControlNo = $_POST['clientControlNo'];    
    $sql = "SELECT * FROM clients WHERE clientControlNo='$clientControlNo'";
    $result = $conn->query($sql);   

    if(!$row = $result->fetch_assoc()){        
        header('Location: ../../../pages/masterfiles/client.php');
    }else{
        $sql = "DELETE FROM `clients` WHERE `clients`.`clientControlNo` = '$clientControlNo'";
        $result = $conn->query($sql);
        header('Location: ../../../pages/masterfiles/client.php');
    }    
?>