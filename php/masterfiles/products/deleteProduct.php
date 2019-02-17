<?php
    include "../../databaseConn.php";
    $prodID = $_POST['prodID'];
    $sql = "DELETE FROM `products` WHERE `products`.`prodID` = $prodID";
    $result = $conn->query($sql);
    $sql = "DELETE FROM `inventory` WHERE `inventory`.`prodID` = $prodID";
    $result = $conn->query($sql);
?>