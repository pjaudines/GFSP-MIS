<?php

// query para sa purchase order by item name
$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res = $conn->query("SELECT * FROM `transactions_purchaseorder-items` GROUP BY itemName") or die(mysqli_error());
$data_points = array();
while($result = $res->fetch_array()){
    $R = $result['itemName'];
    $q1 = $conn->query("SELECT *, sum(Quantity) as total FROM `transactions_purchaseorder-items` WHERE `itemName` = '$R' group by itemName") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = intval($f1['total']);
    $point = array('label' => $R, 'y' => $FR);
    array_push($data_points, $point);
}
json_encode($data_points);
?>

<?php

// query para sa purchase order by item type

$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res2 = $conn->query("SELECT * FROM `transactions_purchaseorder-items` GROUP BY itemType") or die(mysqli_error());
$data_points2 = array();
while($result2 = $res2->fetch_array()){
    $R2 = $result2['itemType'];
    $q2 = $conn->query("SELECT *, sum(Quantity) as total FROM `transactions_purchaseorder-items` WHERE `itemType` = '$R2' group by itemType") or die(mysqli_error());
    $f2 = $q2->fetch_array();
    $FR2 = intval($f2['total']);
    $point2 = array('label' => $R2, 'y' => $FR2);
    array_push($data_points2, $point2);
}
json_encode($data_points);
?>

<?php

// query para sa purchase order by item type

$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res2 = $conn->query("SELECT * FROM `transactions_purchaseorder-items` GROUP BY itemType") or die(mysqli_error());
$data_points2 = array();
while($result2 = $res2->fetch_array()){
    $R2 = $result2['itemType'];
    $q2 = $conn->query("SELECT *, sum(Quantity) as total FROM `transactions_purchaseorder-items` WHERE `itemType` = '$R2' group by itemType") or die(mysqli_error());
    $f2 = $q2->fetch_array();
    $FR2 = intval($f2['total']);
    $point2 = array('label' => $R2, 'y' => $FR2);
    array_push($data_points2, $point2);
}
json_encode($data_points);
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
            exportFileName: "Purchase Order by Item Name", 
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
                    text: "Purchase Order by Item Name"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Total Quantity Purchase", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    // mga chart type - pie, doughnut, line, bar, column, spline, area, splineArea
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Total Quantity Purchase by Item Name",
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
                exportFileName: "Purchase Order by Item Type", 
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
                text: "Purchase Order by Item Type"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Total Quantity Purchase By Item Type", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    // mga chart type - pie, doughnut, line, bar, column, spline, area, splineArea
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Total Quantity Purchase by Item Type",
                    name: "Quantity",
                    dataPoints: <?php echo json_encode($data_points2); ?>
                }
                    ] 
                });


                chart1.render();
                chart2.render();
                });

</script>