<!-- This yearly bar graph is for the overall crime video rate per year in barangay socorro starts from the development up to the present-->
<!--counting overall total videos per year-->



<?php

include 'connections/db_connect.php';
$query = "SELECT year_uploaded, count(year_uploaded) FROM crime_video group by year_uploaded";
$res = $con->query($query);

?>

<!--
Select test.mid, test.pid, A.cnt as midCount, count(*) as pidCount
from test join
(Select mid, count(*) as cnt from test group by mid) A
on test.mid =  A.mid
Group by mid, pid    
-->

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">	
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Overall Videos Count'],
          
        
		
	<?php
	while($row=$res->fetch_assoc())
	{
	echo "['".$row['year_uploaded']."',".$row['count(year_uploaded)']."],";
	}


	?>
		
		]);

        var options = {
          chart: {
            title: 'Yearly Overall Crime Video Rates',
            subtitle: 'Crime Video Rate per Year: From 2018- Up to Present',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3'],
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        var btns = document.getElementById('btn-group');

        btns.onclick = function (e) {

          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
	  </script>
	  </head>
  <body>
    <div id="chart_div" style="width: 800px; height: 500px"></div>
  </body>
</html>