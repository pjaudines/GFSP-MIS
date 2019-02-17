<?php

// query para sa inventory current stocks
$conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
$res = $conn->query(" select * from `transactions_delivery-items`,`transactions_delivery` WHERE `transactions_delivery-items`.deliveryID=transactions_delivery.deliveryID GROUP BY `transactions_delivery-items`.deliveryID=transactions_delivery.deliveryID") or die(mysqli_error());
$data_points = array();
while($result = $res->fetch_array()){
    $R = $result['itemType'];
    $q1 = $conn->query("select * from `transactions_delivery-items`,`transactions_delivery` WHERE `transactions_delivery-items`.deliveryID=transactions_delivery.deliveryID GROUP BY `transactions_delivery-items`.deliveryID=transactions_delivery.deliveryID = '$R'") or die(mysqli_error());
    $f1 = $q1->fetch_array();
    $FR = mysqli_num_rows($q1);
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
                    text: "Delivery Reports"
                }
            ],
            axisX: {	
                interval: 1,
                labelFontColor: "black",
            },
            axisY: { 
                title: "Delivery Reports", 
                includeZero: false,
                labelFontColor: "black",
            },
            data: [ 
                { 
                    // mga chart type - pie, doughnut, line, bar, column, spline, area, splineArea
                    type: "bar", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "Delivery",
                    name: "Counts",
                    dataPoints: <?php echo json_encode($data_points); ?>
                }
                    ] 
                });

           


               


                chart1.render();
                chart2.render();
                });

</script>