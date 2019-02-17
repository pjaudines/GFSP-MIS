<?php require 'require/salesquery.php'?>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        var chart1 = new CanvasJS.Chart("chartContainer1",{
            theme: "light2",
            zoomEnabled: true,
            zoomType: "x",
            panEnabled: true,
            animationEnabled: true,
            animationDuration: 1000,
            exportFileName: "Sales per Month", 
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
                    text: "Sales per Month for the Year - <?php echo $year?>"
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
                    type: "pie", 
                    indexLabel: "{label} - {y}", 
                    showInLegend: true,
                    legendText: "{label}",
                    name: "Total",
                    dataPoints: <?php echo json_encode($data_points1); ?>
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
                exportFileName: "Sales per Year", 
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
                text: "Sales per Year - <?php echo $year?>"
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
                    type: "pie", 
                    indexLabel: "{label} - {y}", 
                    showInLegend: true,
                    legendText: "{label}",
                    name: "Total",
                    dataPoints: <?php echo json_encode($data_points2); ?>
                }
                    ] 
                });

                chart1.render();
                chart2.render();
                });

</script>