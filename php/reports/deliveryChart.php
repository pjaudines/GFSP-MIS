<?php

// query para sa inventory current stocks
$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res = $conn->query("SELECT * FROM `transactions_delivery` GROUP BY deliveryID") or die(mysqli_error());
$data_points = array();
while($result = $res->fetch_array()){
    $R = $result['prodDesc'];
    $q1 = $conn->query("SELECT * FROM `transactions_delivery` WHERE `deliveryID` = '$R'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = intval($f1['prodStocks']);
    $point = array('label' => $R, 'y' => $FR);
    array_push($data_points, $point);
}
json_encode($data_points);

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
                    text: "Current Inventory"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Current Stocks", 
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
                title: "Incoming Stocks", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Incoming Stocks",
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
                title: "Outgoing Stocks", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Outgoing Stocks",
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