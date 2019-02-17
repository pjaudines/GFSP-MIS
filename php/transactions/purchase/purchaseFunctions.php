<?php
    include "../../php/databaseConn.php";
    
    function createPO(){
    $supplierName = $_POST['supplierName'];
    $date = date("Y-m-d");    
    $paymentTerm = $_POST['paymentTerm'];
    $sql = "INSERT INTO transactions_purchaseorders (purchaseSupplier, purchaseTerms, purchaseDate) values ('$supplierName','$paymentTerm', '$date')";
    $result = $conn->query($sql);
    }

    function testSub(){
        echo "WEW";
    }
    function loadPurchases(){
        include "../../php/transactions/purchase/displayPurchases.php";
    }
    
?>