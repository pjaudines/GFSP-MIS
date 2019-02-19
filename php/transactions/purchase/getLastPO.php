<?php    
    include "../../databaseConn.php";  
    $query = $conn->query("SELECT * FROM `transactions_purchaseorders` ORDER BY `purchaseID` DESC LIMIT 1") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $purchaseID = $fetch['purchaseID'];
    echo $purchaseID;
?>