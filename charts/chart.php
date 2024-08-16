<!-- This chart is for the whole video crime rate in barangay socorro starts from the development up to the present-->
<!-- Crimes has "count" on database to be able to count the statistics of every crime-->
<!-- Crimes are the fields on the chart-->


<!--Calculation "percent x whole total quantity = total of item"  -->
<!--Calculation "total of item / whole total quantity = percent"  -->
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
          ['video_category', 'count'],





	<?php
	while($row=$res->fetch_assoc())
	{
	echo "['".$row['video_category']."',".$row['count(video_category)']."],";
	}


	?>
]);
        var options = {
          title: 'Current Video Crime Rates in Barangay Socorro',
	 <!-- is3D:true, -->
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

  </head>
  <body>
  
   <div id="piechart" style="width: 800px; height: 500px;" align="center"></div>
	
  </body>
</html>