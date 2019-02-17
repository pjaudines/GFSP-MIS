<?php    
    include "../../databaseConn.php";  
    $query = $conn->query("SELECT * FROM `clients` ORDER BY `clientControlNo` DESC LIMIT 1") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $clientControlNo = $fetch['clientControlNo'];
    echo $clientControlNo;
?>