<?php

// query para sa inventory current stocks
$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res = $conn->query("SELECT * FROM `transactions_purchaseorders` GROUP BY purchaseDate") or die(mysqli_error());
$data_points = array();
while($result = $res->fetch_array()){
    $R = $result['purchaseDate'];
    $q1 = $conn->query("SELECT * FROM `transactions_purchaseorders` WHERE `purchaseDate` = '$R'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = intval($f1['purchaseSupplier']);
    $point = array('label' => $R, 'y' => $FR);
    array_push($data_points, $point);
}
json_encode($data_points);

// query para sa incoming products
$res2 = $conn->query("SELECT * FROM `transactions_purchaseorder-items` GROUP BY itemType") or die(mysqli_error());
$data_points2 = array();
while($result2 = $res2->fetch_array()){
    $R2 = $result2['itemType'];
    $FR2 = intval($result2['Quantity']);
    $point2 = array('label' => $R2, 'y' => $FR2);
    array_push($data_points2, $point2);
}
json_encode($data_points2);

// query para sa outgoing products
?>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        var chart1 = new CanvasJS.Chart("chartContainer2",{
            theme: "light2",
            zoomEnabled: true,
            zoomType: "x",
            panEnabled: true,
            animationEnabled: true,
            animationDuration: 1000,
            exportFileName: "Purchases", 
            exportEnabled: true,
            toolTip: {
                shared: true  
            },
            title: { 
                text: "Gibrosen Fire Fire Safety Products",
                fontSize: 20
            },
            subtitles:[
                {
                    text: "Purchases to Supplier"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Purchases Reports", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    // mga chart type - pie, doughnut, line, bar, column, spline, area, splineArea
                    type: "bar", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Purchases",
                    name: "Quantity",
                    dataPoints: <?php echo json_encode($data_points); ?>
                }
                    ] 
                });

                var chart2 = new CanvasJS.Chart("chartContainer3",{
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
                    type: "bar", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Incoming Stocks",
                    name: "Quantity",
                    dataPoints: <?php echo json_encode($data_points2); ?>
                }
                    ] 
                });

                chart1.render();
                chart2.render();
              
                });

</script>