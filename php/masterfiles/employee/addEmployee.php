<?php
    session_start(); 
    include "../../databaseConn.php";
    $employeeNo = $_POST['employeeNo'];
    $employeeName = $_POST['employeeName'];
    $employeeEmail = $_POST['employeeEmail'];
    $employeeContactNo = $_POST['employeeContactNo'];
    $employeeAddress = $_POST['employeeAddress'];
    $employeePosition = $_POST['employeePosition'];
 
    $sql = "SELECT * from `employees` where `employeeName` = '$employeeName'";
    
    if(mysqli_num_rows($result = $conn->query($sql))){
        echo "fail";
    }else{
        $sql = "INSERT INTO employees (employeeID, employeeName, employeeAddress,employeeContactNo,employeeEmail,employeePosition) values ('$employeeNo','$employeeName','$employeeAddress','$employeeContactNo','$employeeEmail','$employeePosition')";
        $result = $conn->query($sql); 
        echo "Added to database!";
    }
    

?>