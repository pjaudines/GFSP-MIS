<?php    
    include "../../databaseConn.php";  
    $query = $conn->query("SELECT * FROM `transactions_delivery` ORDER BY `deliveryID` DESC LIMIT 1") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $deliveryID = $fetch['deliveryID'];
    echo $deliveryID;
?>