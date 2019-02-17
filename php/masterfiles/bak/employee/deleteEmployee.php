<?php    
    require '../../databaseConn.php';
    $employeeID = $_POST['employeeID'];    
    $sql = "SELECT * FROM employees WHERE employeeID='$employeeID'";
    $result = $conn->query($sql);   

    if(!$row = $result->fetch_assoc()){        
        header('Location: ../../../pages/masterfiles/employee.php');
    }else{
        $sql = "DELETE FROM `employees` WHERE `employees`.`employeeID` = '$employeeID'";
        $result = $conn->query($sql);
        header('Location: ../../../pages/masterfiles/employee.php');
    }
?>