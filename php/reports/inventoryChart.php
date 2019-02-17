<?php

// query para sa inventory current stocks
$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res = $conn->query("SELECT * FROM `inventory` GROUP BY prodDesc") or die(mysqli_error());
$data_points = array();
while($result = $res->fetch_array()){
    $R = $result['prodDesc'];
    $q1 = $conn->query("SELECT * FROM `inventory` WHERE `prodDesc` = '$R'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = intval($f1['prodStocks']);
    $point = array('label' => $R, 'y' => $FR);
    array_push($data_points, $point);
}
json_encode($data_points);

// query para sa incoming products
$res2 = $conn->query("SELECT * FROM `inventory` GROUP BY prodDesc") or die(mysqli_error());
$data_points2 = array();
while($result2 = $res2->fetch_array()){
    $R2 = $result2['prodDesc'];
    $q2 = $conn->query("SELECT * FROM `inventory` WHERE `prodDesc` = '$R2'") or die(mysqli_error());
    $f2 = $q2->fetch_array();
    $FR2 = intval($f2['prodIncoming']);
    $point2 = array('label' => $R2, 'y' => $FR2);
    array_push($data_points2, $point2);
}
json_encode($data_points2);

// query para sa outgoing products
$res3 = $conn->query("SELECT * FROM `inventory` GROUP BY prodDesc") or die(mysqli_error());
$data_points3 = array();
while($result3 = $res3->fetch_array()){
    $R3 = $result3['prodDesc'];
    $q3 = $conn->query("SELECT * FROM `inventory` WHERE `prodDesc` = '$R3'") or die(mysqli_error());
    $f3 = $q3->fetch_array();
    $FR3 = intval($f3['prodOutgoing']);
    $point3 = array('label' => $R3, 'y' => $FR3);
    array_push($data_points3, $point3);
}
json_encode($data_points3);
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
            exportFileName: "Current Supplies", 
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
                    text: "Total Current Supplies"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Current Supplies", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    // mga chart type - pie, doughnut, line, bar, column, spline, area, splineArea
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Current Supplies",
                    name: "Quantity",
                    dataPoints: <?php echo json_encode($data_points); ?>
                }
                    ] 
                });

                var chart2 = new CanvasJS.Chart("chartContainer2",{
                theme: "light2",
                zoomEnabled: true,
                zoomType: "x",
                panEnabled: true,
                animationEnabled: true,
                animationDuration: 1000,
                exportFileName: "Product Incoming", 
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
                text: "Incoming Supplies"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Incoming Supplies", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Incoming Supplies",
                    name: "Quantity",
                    dataPoints: <?php echo json_encode($data_points2); ?>
                }
                    ] 
                });

                var chart3 = new CanvasJS.Chart("chartContainer3",{
                theme: "light2",
                zoomEnabled: true,
                zoomType: "x",
                panEnabled: true,
                animationEnabled: true,
                animationDuration: 1000,
                exportFileName: "Product Outgoing", 
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
                text: "Outgoing Supplies"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Outgoing Supplies", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Outgoing Supplies",
                    name: "Quantity",
                    dataPoints: <?php echo json_encode($data_points3); ?>
                }
                    ] 
                });


                chart1.render();
                chart2.render();
                chart3.render();
                });

</script>