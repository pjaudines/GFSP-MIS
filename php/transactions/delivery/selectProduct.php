<?php
    include "../../databaseConn.php";
    $prodType = $_POST['prodType'];
    echo "<option value='none'>Select Product</option>";
    $query = $conn->query("SELECT * FROM `products` WHERE prodType = '$prodType' ORDER BY `prodDesc`") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        echo "<option value='".$fetch['prodDesc']."'>".$fetch['prodDesc']."</option>";
    }            
?>