<?php

// query para sa inventory current stocks
$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res = $conn->query("SELECT * FROM `transactions_sales` GROUP BY salesDate") or die(mysqli_error());
$data_points = array();

if($_POST['wew'] == "month"){
    
    //JANUARY
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-01'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'January', 'y' => $FR);
    array_push($data_points, $point);

    //February
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-02'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'February', 'y' => $FR);
    array_push($data_points, $point);

    //March
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-03'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'March', 'y' => $FR);
    array_push($data_points, $point);

    //April
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-04'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'April', 'y' => $FR);
    array_push($data_points, $point);

    //May
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-05'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'May', 'y' => $FR);
    array_push($data_points, $point);

    //June
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-06'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'June', 'y' => $FR);
    array_push($data_points, $point);

    //July
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-07'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'July', 'y' => $FR);
    array_push($data_points, $point);

    //August
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-08'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'August', 'y' => $FR);
    array_push($data_points, $point);

    //September
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-09'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'September', 'y' => $FR);
    array_push($data_points, $point);

    //October
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-10'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'October', 'y' => $FR);
    array_push($data_points, $point);

    //November
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-11'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'November', 'y' => $FR);
    array_push($data_points, $point);

    //December
    $q1 = $conn->query("SELECT * FROM `transactions_sales` WHERE `salesDate` like '2019-%%-12'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
    $point = array('label' => 'December', 'y' => $FR);
    array_push($data_points, $point);

    
json_encode($data_points);
}

// query para sa incoming products
?>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        var chart1 = new CanvasJS.Chart("chartContainer1",{
            theme: "light2",
            zoomEnabled: true,
            zoomType: "x",
            panEnabled: true,
            animationEnabled: true,
            animationDuration: 1000,
            exportFileName: "Current Sales Gibrosen", 
            exportEnabled: true,
            toolTip: {
                shared: true  
            },
            title: { 
                text: "Gibrosen Fire Office",
                fontSize: 20
            },
            subtitles:[
                {
                    text: "Sales"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Sales Report", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    // mga chart type - pie, doughnut, line, bar, column, spline, area, splineArea
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Sales Report",
                    name: "Quantity",
                    dataPoints: <?php echo json_encode($data_points); ?>
                }
                    ] 
                });

                
                chart1.render();
                });

</script>