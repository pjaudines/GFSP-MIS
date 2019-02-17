<?php
    include "../databaseConn.php";
    $prodType = $_POST['productType'];
    echo "<option value='none'>Select Product</option>";
    $query = $conn->query("SELECT DISTINCT * FROM `inventory` WHERE prodType = '$prodType'") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        echo "<option value='".$fetch['inventoryItemID']."'>".$fetch['prodDesc']."</option>";
    }            
?>