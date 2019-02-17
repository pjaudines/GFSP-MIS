    <?php
    
    $conn = new mysqli("localhost", "root", "", "gibrosen") or die(mysqli_error());
    $qry = "SELECT * FROM clients  ";
    $result = mysqli_query ($conn,$qry);
    ?>
  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Client Name', 'Client Address''Client Contact Number', 'Client Email', 'Client Contact Person'],
                <?php
                while($row = mysql_fetch_array($result))
                {
                    echo"['".$row["clientName"]."',".$row["clientAddress"]."',".$row["clientContactNo"]."',".$row["clientEmail"]."',".$row["clientContactPerson"]."'],";

                }
                ?>
        ]);

        var options = {
          title: 'Client Report'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
