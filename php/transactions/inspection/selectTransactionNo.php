<?php
    include "../../databaseConn.php";
    $clientName = $_POST['clientName'];
    echo "<option value='none'>Select Transaction No.</option>";
    $query = $conn->query("SELECT * FROM `transactions_inspection` WHERE `inspectionStartDate` = '0000-00-00' AND `inspectionEndDate` = '0000-00-00' AND `inspectionClientName` = '$clientName'") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        echo "<option value='".$fetch['inspectionID']."'>".$fetch['inspectionID']."</option>";
    }            
?>