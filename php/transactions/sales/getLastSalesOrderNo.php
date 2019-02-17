<?php    
    include "../../databaseConn.php";  
    $query = $conn->query("SELECT * FROM `transactions_sales` ORDER BY `salesID` DESC LIMIT 1") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $salesID = $fetch['salesID'];
    echo $salesID;
?>