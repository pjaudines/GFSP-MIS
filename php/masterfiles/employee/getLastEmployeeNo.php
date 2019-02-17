<?php    
    include "../../databaseConn.php";  
    $query = $conn->query("SELECT * FROM `employees` ORDER BY `employeeID` DESC LIMIT 1") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $employeeID = $fetch['employeeID'];
    echo $employeeID;
?>