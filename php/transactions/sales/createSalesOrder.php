<?php
    include "../../databaseConn.php";
    $clientName = $_POST['clientName'];
    $clientControlNo = $_POST['clientControlNo'];
    $date = $_POST['selectedDate'];    
    $paymentTerm = $_POST['paymentTerm'];
    $sql = "INSERT INTO transactions_sales (clientControlNo, clientName, Terms, salesDate) values ('$clientControlNo','$clientName', '$paymentTerm','$date')";
    $result = $conn->query($sql);
?>