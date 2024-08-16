<?php

$dbhandle = new mysqli('localhost','root','','capstone2018');
echo $dbhandle->connect_error;

$query = "SELECT year_uploaded, count(year_uploaded) FROM crime_video group by year_uploaded";
$res = $dbhandle->query($query);

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">	
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {


var data = google.visualization.arrayToDataTable([
        ['Year', 'Overall Videos Count' , { role: 'annotation' } ],
        ['<?php echo ".$row['year_uploaded']."; ?>', <?php echo ".$row['count(year_uploaded)']."; ?>, '']


	<?php
	while($row=$res->fetch_assoc())
	{
	echo "['".$row['year_uploaded']."',".$row['count(year_uploaded)']."],";
	}


	?>



      ]);

      var options = {
        width: 600,
        height: 400,
        legend: { position: 'top', maxLines: 3 },
        bar: { groupWidth: '75%' },
        isStacked: true,
      };
	  
	  
	  </script>
	  </head>
  <body>
    <div id="chart_div" style="width: 800px; height: 500px"></div>
  </body>
</html>