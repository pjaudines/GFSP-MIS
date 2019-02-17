<?php
$year = date('Y');
if(isset($_GET['year']))
{
    $year=$_GET['year'];
}

require '../databaseConn.php';

//for monthly
$res1 = $conn->query("SELECT * FROM `transactions_sales` where `year` = '$year' group by month") or die(mysqli_error());
$data_points1 = array();
while($result1 = $res1->fetch_array()){
    $R1 = $result1['month'];
    $q1 = $conn->query("SELECT sum(salesTotal) as total FROM `transactions_sales` WHERE `month` = '$R1' && `year` = '$year' group by month") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR1 = intval($f1['total']);    
    $point1 = array('label' => $R1, 'y' => $FR1);
    array_push($data_points1, $point1);
}
json_encode($data_points1);


// for yearly
$res2 = $conn->query("SELECT * FROM `transactions_sales` group by year") or die(mysqli_error());
$data_points2 = array();
while($result2 = $res2->fetch_array()){
    $R2 = $result2['year'];
    $q2 = $conn->query("SELECT sum(salesTotal) as total FROM `transactions_sales` WHERE `year` = '$R2' group by year") or die(mysqli_error());
    $f2 = $q2->fetch_array();
    $FR2 = intval($f2['total']);    
    $point2 = array('label' => $R2, 'y' => $FR2);
    array_push($data_points2, $point2);
}
json_encode($data_points2);
?>