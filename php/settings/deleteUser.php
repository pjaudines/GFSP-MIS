<?php    
    include "../../php/databaseConn.php";
    $userID = $_POST['userID'];
    $employeeID = $_POST['employeeID'];

    $sql = "SELECT * FROM `users` WHERE userID='$userID'";
    $result = $conn->query($sql);
    

    if(!$row = $result->fetch_assoc()){        
        header('Location: ../../pages/settings/user-accounts.php');
    }else{
        $sql = "DELETE FROM `users` WHERE `users`.`userID` = '$userID'";
        $result = $conn->query($sql);

        $sql = "UPDATE `employees` SET `hasAccount` = '0' WHERE `employees`.`employeeID` = '$employeeID'";
        $result = $conn->query($sql);
        
    }   
    header('Location: ../../pages/settings/user-accounts.php'); 
?>