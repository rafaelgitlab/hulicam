<!-- This chart is for the Location with the Highest Crime Video Rates in barangay socorro starts from the development up to the present-->
<!-- Location has "count" on database to be able to count the statistics of every crime per location-->
<!-- Location are the fields on the chart-->



<!--Calculation "percent x whole total quantity = total of item"  -->
<!--Calculation "total of item / whole total quantity = percent"  -->

<?php

include 'connections/db_connect.php';

$query5 = "SELECT location, count(location) FROM crime_video group by location";
$res5 = $con->query($query5);

?>



<?php

include 'connections/db_connect.php';

$query5 = "SELECT location, count(location) FROM crime_video group by location";
$res5 = $con->query($query5);

?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

   var data = google.visualization.arrayToDataTable([
          ['location', 'count'],





	<?php
	while($row=$res5->fetch_assoc())
	{
	echo "['".$row['location']."',".$row['count(location)']."],";
	}


	?>
]);
        var options = {
          title: 'Barangay Socorro Location with the Highest Crime Video Rates',
	 is3D:true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  
   <div id="piechart2" style="width: 800px; height: 500px;" align="center"></div>
	
  </body>
</html>