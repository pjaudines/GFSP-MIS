<?php
    include "../../databaseConn.php";
    $prodType = $_POST['productType'];
    echo "<option value='none'>Select Product</option>";
    $query = $conn->query("SELECT * FROM `inventory` WHERE prodType = '$prodType' AND prodStocks > 0 ORDER BY `prodDesc` ASC") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        echo "<option value='".$fetch['prodDesc']."'>".$fetch['prodDesc']."</option>";
    }     
?>