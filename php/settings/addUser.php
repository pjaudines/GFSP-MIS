<?php
    session_start(); 
    include '../databaseConn.php';
    $username = $_POST['username'];
    $userOwner = $_POST['selectedUserOwner'];
    $password= $_POST['p1'];    
    $employeeID = $_POST['employeeID'];
    $sql = "INSERT INTO users (`username`, `password`, `employeeID`,`userOwner`) values ('$username','$password', '$employeeID','$userOwner')";
    $result = $conn->query($sql);
    $sql = "UPDATE `employees` SET `hasAccount` = '1' WHERE `employees`.`employeeID` = $employeeID";
    $result = $conn->query($sql);
?>