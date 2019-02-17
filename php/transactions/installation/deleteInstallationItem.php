<?php
    $installationItemID = $_POST['installationItemID'];
    include "../../databaseConn.php";    
    $sql = "DELETE FROM `transactions_installation-items` WHERE `transactions_installation-items`.`installationItemID` = $installationItemID;";
    $result = $conn->query($sql);
?>