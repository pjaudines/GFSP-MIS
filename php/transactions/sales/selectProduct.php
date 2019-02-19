<?php
    include "../../databaseConn.php";
    $prodType = $_POST['prodType'];
    echo "<option value='none'>Select Product</option>";
    $query = $conn->query("SELECT * FROM `inventory` WHERE prodType = '$prodType' AND prodStocks != 0") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        $prodID = $fetch['prodID'];
        $qry = $conn->query("SELECT * FROM `products` WHERE `prodID` = '$prodID'") or die(mysqli_error());
        $fetch2 = $qry->fetch_array();
        echo "<option value='".$fetch['prodDesc']."'>".$fetch['prodDesc']." (Stocks: ".$fetch['prodStocks'].", Price: ".$fetch2['unitPrice'].")</option>";
    }            
?>