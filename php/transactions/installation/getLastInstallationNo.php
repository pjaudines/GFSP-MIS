<?php    
    include "../../databaseConn.php";  
    $query = $conn->query("SELECT * FROM `transactions_installation` ORDER BY `installationID` DESC LIMIT 1") or die(mysqli_error());
    $fetch = $query->fetch_array();
    $installationID = $fetch['installationID'];
    if($installationID == null){
        echo "0";
    }else{
        echo $installationID;
    }

?>