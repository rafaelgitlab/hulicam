<!-- This line chart is for the whole video crime category rate in barangay socorro starts from the development up to the present-->
<!-- Crimes has "count" on database per category to be able to count the statistics of every crime-->
<?php

include 'connections/db_connect.php';

$query = "SELECT video_category, count(video_category) FROM crime_video group by video_category";
$res = $con->query($query);

?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['video_category', 'Crime Count'],
    
	<?php
	while($row=$res->fetch_assoc())
	{
	echo "['".$row['video_category']."',".$row['count(video_category)']."],";
	}


	?>

	]);

        var options = {
          title: 'Crime Category With The Highest Video Crime Rates in Barangay Socorro',
		is3D:true,
          curveType: 'function',
          legend: { position: 'right' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 800px; height: 500px"></div>
  </body>
</html>