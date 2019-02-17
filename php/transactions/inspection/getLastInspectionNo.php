<?php    
    include "../../databaseConn.php";  
    $query = $conn->query("SELECT * FROM `transactions_inspection` ORDER BY `inspectionID` DESC LIMIT 1") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $inspectionID = $fetch['inspectionID'];
    echo $inspectionID;
?>