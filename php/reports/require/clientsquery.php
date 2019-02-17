<!-- Monthly clients -->
<?php
// para ni dex sa dropdown ka year, kun anu gin pili amu na year amu mana ang iload nga data sa chart dex.
$year = date('Y');
if(isset($_GET['year']))
{
    $year=$_GET['year'];
}

require '../databaseConn.php';
$qjan = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Jan' && `year` = '$year'") or die(mysqli_error());
$fjan = $qjan->fetch_array();
$qfeb = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Feb' && `year` = '$year'") or die(mysqli_error());
$ffeb = $qfeb->fetch_array();
$qmar = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Mar' && `year` = '$year'") or die(mysqli_error());
$fmar = $qmar->fetch_array();
$qapr = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Apr' && `year` = '$year'") or die(mysqli_error());
$fapr = $qapr->fetch_array();
$qmay = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'May' && `year` = '$year'") or die(mysqli_error());
$fmay = $qmay->fetch_array();
$qjun = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Jun' && `year` = '$year'") or die(mysqli_error());
$fjun = $qjun->fetch_array();
$qjul = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Jul' && `year` = '$year'") or die(mysqli_error());
$fjul = $qjul->fetch_array();
$qaug = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Aug' && `year` = '$year'") or die(mysqli_error());
$faug = $qaug->fetch_array();
$qsep = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Sep' && `year` = '$year'") or die(mysqli_error());
$fsep = $qsep->fetch_array();
$qoct = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Oct' && `year` = '$year'") or die(mysqli_error());
$foct = $qoct->fetch_array();
$qnov = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Nov' && `year` = '$year'") or die(mysqli_error());
$fnov = $qnov->fetch_array();
$qdec = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Dec' && `year` = '$year'") or die(mysqli_error());
$fdec = $qdec->fetch_array();
$total = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `year` = '$year'") or die(mysqli_error());
$total = $total->fetch_array();

// query para sa year of clients
$res = $conn->query("SELECT * FROM `clients` GROUP BY year") or die(mysqli_error());
$data_points = array();
while($result = $res->fetch_array()){
    $R = $result['year'];
    $q1 = $conn->query("SELECT count(*) as total FROM `clients` WHERE `year` = '$R' group by year") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = intval($f1['total']);
    $point = array('label' => $R, 'y' => $FR);
    array_push($data_points, $point);
}
json_encode($data_points);

$qjan1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Jan' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$fjan1 = $qjan1->fetch_array();
$qfeb1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Feb' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$ffeb1 = $qfeb1->fetch_array();
$qmar1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Mar' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$fmar1 = $qmar1->fetch_array();
$qapr1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Apr' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$fapr1 = $qapr1->fetch_array();
$qmay1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'May' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$fmay1 = $qmay1->fetch_array();
$qjun1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Jun' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$fjun1 = $qjun1->fetch_array();
$qjul1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Jul' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$fjul1 = $qjul1->fetch_array();
$qaug1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Aug' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$faug1 = $qaug1->fetch_array();
$qsep1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Sep' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$fsep1 = $qsep1->fetch_array();
$qoct1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Oct' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$foct1 = $qoct1->fetch_array();
$qnov1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Nov' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$fnov1 = $qnov1->fetch_array();
$qdec1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Dec' && `year` = '$year' && `clientType` = 'Company'") or die(mysqli_error());
$fdec1 = $qdec1->fetch_array();
$total1 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `year` = '$year'") or die(mysqli_error());
$total1 = $total1->fetch_array();


$qjan2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Jan' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$fjan2 = $qjan2->fetch_array();
$qfeb2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Feb' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$ffeb2 = $qfeb2->fetch_array();
$qmar2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Mar' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$fmar2 = $qmar2->fetch_array();
$qapr2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Apr' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$fapr2 = $qapr2->fetch_array();
$qmay2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'May' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$fmay2 = $qmay2->fetch_array();
$qjun2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Jun' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$fjun2 = $qjun2->fetch_array();
$qjul2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Jul' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$fjul2 = $qjul2->fetch_array();
$qaug2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Aug' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$faug2 = $qaug2->fetch_array();
$qsep2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Sep' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$fsep2 = $qsep2->fetch_array();
$qoct2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Oct' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$foct2 = $qoct2->fetch_array();
$qnov2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Nov' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$fnov2 = $qnov2->fetch_array();
$qdec2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `month` = 'Dec' && `year` = '$year' && `clientType` = 'Walk In'") or die(mysqli_error());
$fdec2 = $qdec2->fetch_array();
$total2 = $conn->query("SELECT COUNT(*) as total FROM `clients` WHERE `year` = '$year'") or die(mysqli_error());
$total2 = $total2->fetch_array();


?>