<?php
    $clientControlNo = $_POST['clientControlNo'];
    $_SESSION['clientControlNo'] = $clientControlNo;
    require '../../databaseConn.php';
    $query = $conn->query("SELECT * FROM `clients` where `clientControlNo` = ".$clientControlNo."") or die(mysqli_error());
    while($fetch = $query->fetch_array()){
        $clientEmail = $fetch['clientEmail'];
        $_SESSION['clientEmail'] = $clientEmail;
    }
    header('Location: ../../../pages/notifications/email.php');
?>