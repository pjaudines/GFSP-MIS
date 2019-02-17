<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $prodName = $_POST['prodName'];
    //END RECEVING OF POSTED DATA
    $query = $conn->query("select * from `inventory` where `prodDesc` ='".$prodName."'") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        echo $fetch['reorderPoint'];
    }
?>