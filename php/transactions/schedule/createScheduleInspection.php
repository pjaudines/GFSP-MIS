<?php
    include "../../databaseConn.php";
    session_start();
    //RECEIVES THE POSTED DATA
    $inspectionID = $_POST['inspectionID'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    //END RECEVING OF POSTED DATA
    $query = $conn->query("UPDATE `transactions_inspection` SET `inspectionStartDate` = '$startDate', `inspectionEndDate` = '$endDate' WHERE `inspectionID` = '$inspectionID'") or die(mysqli_error());
    header("LOcation: ../../../pages/scheduling/create-inspection-scheduling.php");
?>