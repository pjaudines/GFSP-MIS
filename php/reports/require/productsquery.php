<?php
// para ni dex sa dropdown ka year, kun anu gin pili amu na year amu mana ang iload nga data sa chart dex.
$year = date('Y');
if(isset($_GET['year']))
{
    $year=$_GET['year'];
}

require '../databaseConn.php';
$qjan = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Jan' && `year` = '$year'") or die(mysqli_error());
$fjan = $qjan->fetch_array();
$qfeb = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Feb' && `year` = '$year'") or die(mysqli_error());
$ffeb = $qfeb->fetch_array();
$qmar = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Mar' && `year` = '$year'") or die(mysqli_error());
$fmar = $qmar->fetch_array();
$qapr = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Apr' && `year` = '$year'") or die(mysqli_error());
$fapr = $qapr->fetch_array();
$qmay = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'May' && `year` = '$year'") or die(mysqli_error());
$fmay = $qmay->fetch_array();
$qjun = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Jun' && `year` = '$year'") or die(mysqli_error());
$fjun = $qjun->fetch_array();
$qjul = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Jul' && `year` = '$year'") or die(mysqli_error());
$fjul = $qjul->fetch_array();
$qaug = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Aug' && `year` = '$year'") or die(mysqli_error());
$faug = $qaug->fetch_array();
$qsep = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Sep' && `year` = '$year'") or die(mysqli_error());
$fsep = $qsep->fetch_array();
$qoct = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Oct' && `year` = '$year'") or die(mysqli_error());
$foct = $qoct->fetch_array();
$qnov = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Nov' && `year` = '$year'") or die(mysqli_error());
$fnov = $qnov->fetch_array();
$qdec = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `month` = 'Dec' && `year` = '$year'") or die(mysqli_error());
$fdec = $qdec->fetch_array();
$total = $conn->query("SELECT COUNT(*) as total FROM `products_masterfile` WHERE `year` = '$year'") or die(mysqli_error());
$total = $total->fetch_array();

// query para sa year of products_masterfile
$res = $conn->query("SELECT * FROM `products_masterfile` GROUP BY year") or die(mysqli_error());
$data_points = array();
while($result = $res->fetch_array()){
    $R = $result['year'];
    $q1 = $conn->query("SELECT count(*) as total FROM `products_masterfile` WHERE `year` = '$R' group by year") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = intval($f1['total']);
    $point = array('label' => $R, 'y' => $FR);
    array_push($data_points, $point);
}
json_encode($data_points);