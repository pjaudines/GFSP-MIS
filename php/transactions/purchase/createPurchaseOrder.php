<?php
    include "../../databaseConn.php";
    $supplierName = $_POST['supplierName'];
    $date = date("Y-m-d");    
    $paymentTerm = $_POST['paymentTerm'];
    $sql = "INSERT INTO transactions_purchaseorders (purchaseSupplier, purchaseTerms, purchaseDate) values ('$supplierName','$paymentTerm', '$date')";
    $result = $conn->query($sql);    
?>