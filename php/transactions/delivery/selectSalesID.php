<?php
    include "../../databaseConn.php";
    $clientName = $_POST['clientName'];
    echo "<option value='none'>Select Transaction No.</option>";
    $query = $conn->query("SELECT * FROM `transactions_sales` WHERE `deliveryID` = '0' AND `clientName` = '$clientName'") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        echo "<option value='".$fetch['salesID']."'>".$fetch['salesID']."</option>";
    }            
?>