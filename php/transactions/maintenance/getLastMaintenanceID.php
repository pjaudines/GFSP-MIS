<?php    
    include "../../databaseConn.php";  
    $query = $conn->query("SELECT * FROM `transactions_maintenance` ORDER BY `maintenanceID` DESC LIMIT 1") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $maintenanceID = $fetch['maintenanceID'];
    echo $maintenanceID;
?>