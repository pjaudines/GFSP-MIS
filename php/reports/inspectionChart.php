<?php

// query para sa inspection items by item Type
$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res = $conn->query("SELECT * FROM `transactions_inspection-items` GROUP BY itemType") or die(mysqli_error());
$data_points = array();
while($result = $res->fetch_array()){
    $R = $result['itemType'];
    $q1 = $conn->query("SELECT *, sum(itemQuantity) as total FROM `transactions_inspection-items` WHERE `itemType` = '$R' group by itemType") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = intval($f1['total']);
    $point = array('label' => $R, 'y' => $FR);
    array_push($data_points, $point);
}
json_encode($data_points);
?>

<?php

// query para sa inspection items by item status
$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res2 = $conn->query("SELECT * FROM `transactions_inspection-items` GROUP BY itemStatus") or die(mysqli_error());
$data_points2 = array();
while($result2 = $res2->fetch_array()){
    $R2 = $result2['itemStatus'];
    $q2 = $conn->query("SELECT *, sum(itemQuantity) as total FROM `transactions_inspection-items` WHERE `itemStatus` = '$R2' group by itemStatus") or die(mysqli_error());
    $f2 = $q2->fetch_array();
    $FR2 = intval($f2['total']);
    $point2 = array('label' => $R2, 'y' => $FR2);
    array_push($data_points2, $point2);
}
json_encode($data_points);
?>

<?php
// query para sa inspection items by item status
$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res3 = $conn->query("SELECT * FROM `transactions_inspection-items` GROUP BY itemName") or die(mysqli_error());
$data_points3 = array();
while($result3 = $res3->fetch_array()){
    $R3 = $result3['itemName'];
    $q3 = $conn->query("SELECT *, sum(itemQuantity) as total FROM `transactions_inspection-items` WHERE `itemName` = '$R3' group by itemName") or die(mysqli_error());
    $f3 = $q3->fetch_array();
    $FR3 = intval($f3['total']);
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
            exportFileName: "Inspected Items - Total Quantity by Item Type", 
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
                    text: "Inspected Items - Total Quantity by Item Type"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Total Count", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    // mga chart type - pie, doughnut, line, bar, column, spline, area, splineArea
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Total Quantity by Item Type",
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
                exportFileName: "Inspected Items - Total Quantity by Item Status", 
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
                text: "Inspected Items - Total Quantity by Item Status"
                
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Total Count", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    // mga chart type - pie, doughnut, line, bar, column, spline, area, splineArea
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Total Quantity by Item Status",
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
                exportFileName: "Current Inventory Gibrosen", 
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
                text: "Total Quantity by Item Name"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Total Count", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    // mga chart type - pie, doughnut, line, bar, column, spline, area, splineArea
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Total Quantity by Item Name",
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