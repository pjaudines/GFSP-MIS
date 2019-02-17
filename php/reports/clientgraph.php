<?php require 'require/clientsquery.php'?>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        var chart1 = new CanvasJS.Chart("chartContainer1",{
            theme: "light2",
            zoomEnabled: true,
            zoomType: "x",
            panEnabled: true,
            colorSet: "customColorSet",
            animationEnabled: true,
            animationDuration: 1000,
            exportFileName: "Monthly clients - GFSP MIS", 
            exportEnabled: true,
            toolTip: {
                shared: true  
            },
            title: { 
                text: "GFSP MIS",
                fontSize: 20
            },
            subtitles:[
                {
                    text: "Clients Monthly Count - Year <?php echo $year?>"
                }
            ],
            legend: {
                cursor: "pointer",
                itemclick: function (e) {
                    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    } else {
                        e.dataSeries.visible = true;
                    }
                    e.chart.render();
                },
                itemmouseover: function(e) {
                    e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness * 2;
                    e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize + 2;
                    e.chart.render();
                },
                itemmouseout: function(e) {
                    e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness / 2;
                    e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize - 2;
                    e.chart.render();
                }
            },
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
                    type: "column", 
                    showInLegend: true, 
                    legendText: "Number of clients",
                    name: "Number of clients",
                    indexLabel: "{y}",
                    dataPoints: [ 
                        { label: "January", y: <?php echo $fjan['total']?> },
                         { label: "February", y: <?php echo $ffeb['total']?> },
                        { label: "March", y: <?php echo $fmar['total']?> },
                         { label: "April", y: <?php echo $fapr['total']?> },
                        { label: "May", y: <?php echo $fmay['total']?> },
                         { label: "June", y: <?php echo $fjun['total']?> },
                        { label: "July", y: <?php echo $fjul['total']?> },
                         { label: "August", y: <?php echo $faug['total']?> },
                        { label: "September", y: <?php echo $fsep['total']?> },
                         { label: "October", y: <?php echo $foct['total']?> },
                        { label: "November", y: <?php echo $fnov['total']?> },
                         { label: "December", y: <?php echo $fdec['total']?> }
                    ] 
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
            exportFileName: "clients per Year", 
            exportEnabled: true,
            toolTip: {
                shared: true  
            },
            title: { 
                text: "GFSP MIS",
                fontSize: 20
            },
            subtitles:[
                {
                    text: "clients per Year"
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
                    type: "column", 
                    indexLabel: "{y}", 
                    showInLegend: true,
                    legendText: "clients per Year",
                    name: "Total",
                    dataPoints: <?php echo json_encode($data_points); ?>
                }
                    ] 
                });

                var chart3 = new CanvasJS.Chart("chartContainer3",{
                theme: "light2",
                zoomEnabled: true,
                zoomType: "x",
                panEnabled: true,
                colorSet: "customColorSet",
                animationEnabled: true,
                animationDuration: 1000,
                exportFileName: "Monthly clients - GFSP MIS", 
                exportEnabled: true,
                toolTip: {
                shared: true  
                },
                title: { 
                text: "GFSP MIS",
                fontSize: 20
                },
                subtitles:[
                {
                text: "Clients Monthly Count - Year <?php echo $year?>"
                }
            ],
            legend: {
                cursor: "pointer",
                itemclick: function (e) {
                    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    } else {
                        e.dataSeries.visible = true;
                    }
                    e.chart.render();
                },
                itemmouseover: function(e) {
                    e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness * 2;
                    e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize + 2;
                    e.chart.render();
                },
                itemmouseout: function(e) {
                    e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness / 2;
                    e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize - 2;
                    e.chart.render();
                }
            },
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
                    type: "stackedColumn", 
                    showInLegend: true, 
                    legendText: "Company",
                    name: "Company",
                    indexLabel: "{y}",
                    dataPoints: [ 
                        { label: "January", y: <?php echo $fjan1['total']?> },
                         { label: "February", y: <?php echo $ffeb1['total']?> },
                        { label: "March", y: <?php echo $fmar1['total']?> },
                         { label: "April", y: <?php echo $fapr1['total']?> },
                        { label: "May", y: <?php echo $fmay1['total']?> },
                         { label: "June", y: <?php echo $fjun1['total']?> },
                        { label: "July", y: <?php echo $fjul1['total']?> },
                         { label: "August", y: <?php echo $faug1['total']?> },
                        { label: "September", y: <?php echo $fsep1['total']?> },
                         { label: "October", y: <?php echo $foct1['total']?> },
                        { label: "November", y: <?php echo $fnov1['total']?> },
                         { label: "December", y: <?php echo $fdec1['total']?> }
                    ] 
                },
                { 
                    type: "stackedColumn", 
                    showInLegend: true, 
                    legendText: "Walk In",
                    name: "Walk In",
                    indexLabel: "{y}",
                    dataPoints: [ 
                        { label: "January", y: <?php echo $fjan2['total']?> },
                         { label: "February", y: <?php echo $ffeb2['total']?> },
                        { label: "March", y: <?php echo $fmar2['total']?> },
                         { label: "April", y: <?php echo $fapr2['total']?> },
                        { label: "May", y: <?php echo $fmay2['total']?> },
                         { label: "June", y: <?php echo $fjun2['total']?> },
                        { label: "July", y: <?php echo $fjul2['total']?> },
                         { label: "August", y: <?php echo $faug2['total']?> },
                        { label: "September", y: <?php echo $fsep2['total']?> },
                         { label: "October", y: <?php echo $foct2['total']?> },
                        { label: "November", y: <?php echo $fnov2['total']?> },
                         { label: "December", y: <?php echo $fdec2['total']?> }
                    ] 
                }
            ] 
        });


        chart1.render();
        chart2.render();
        chart3.render();
    });

</script>