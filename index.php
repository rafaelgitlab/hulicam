<?php include ('session.php');

$_SESSION['callFrom'] = "index.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="120; URL=index.php">
<link rel="icon" href="img/seal.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="./js/index.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="date_time.js"></script>
</head>
<body>


<div class="sidenav">
<?php
include 'sidenav.php';
?>
</div>


<?php


date_default_timezone_set('Asia/Manila');
$date_added = date("M-d-Y");  
$month = date("F");
$day = date("d");
$year = date("Y");
$nod = date("l");
$time = date("h:i:A");

?>
<div class="main">

	<form action="login.php" id="logout">
	<button style="border-radius:1px;width:150px; color:white; float:right;"  type="submit" class="btn btn-dark" ><span class="fa fa-sign-out"></span><b>Logout</b></button>
	</form>

    <h2>VIDEO CRIME RATE</h2>
    <hr>

<div>
     <table cellpadding="0" cellspacing="30" class="table">
          <tr>
          <td>
          <?php
				include 'connections/db_connect.php';
				$query10 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video";
                    $res10 = $con->query($query10);
                    
                    while($row10=$res10->fetch_assoc())
	          {
     
               $totalcount = $row10['count(id)'];
               
               }
     
                    include 'connections/db_connect.php';
                    $query10 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video WHERE month_uploaded='$month' AND day_uploaded='$day' AND year_uploaded='$year'";
                    $res10 = $con->query($query10);
                    
                    while($row10=$res10->fetch_assoc())
               {

               $dailycount = $row10['count(id)'];
               
               }


               $percent = round(($dailycount / $totalcount / 1 ) * 100,2);

              

				?>
                <label><b>Daily Crime: <?php echo $percent;?>%</b></label> 
				<hr>
                <?php
				include 'connections/db_connect.php';
                  
                $dates = date("F");
				$query1 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video WHERE month_uploaded='$month' AND day_uploaded='$day' AND year_uploaded='$year' ORDER BY day_uploaded DESC";
				$res1 = $con->query($query1);
				?>
                     <p><?php
	while($row1=$res1->fetch_assoc())
	{
     echo "
     For the Month of: $dates
     <br>
     Today: <i style='background: #eee;'> $date_added ($nod) </i>
     <br> 
     Total Video Crimes as of Today: ".$row1['count(id)']."
	
	";
	}
?>	
                &nbsp;<a href="#" class="aeye"><i style="font-size:20px ; float:right;" class="fa fa-caret-down"></i></a>
		      <a href="#" class="aaeye"><i style="font-size:20px ; float:right;" class="fa fa-caret-up"></i></a>	
				</p><?php
				include 'connections/db_connect.php';
				
				$query = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video group by month_uploaded,day_uploaded,year_uploaded  DESC";
				$res = $con->query($query);
				?>
               
               </p>
                <hr>    
                <div class="acategories">   
                <p><?php
	while($row=$res->fetch_assoc())
	{
     echo " ".$row['month_uploaded']." ".$row['day_uploaded']." ".$row['year_uploaded']." : ".$row['count(id)']."<br>";
   
	}
     

?></p>
               </div>
          </td>



          <td>
          <?php
                    date_default_timezone_set('Asia/Manila');    
                    $date_added2 = date("M-d-Y", strtotime('last Monday'));
                    $monday = date('l', strtotime('last Monday'));
                    $date_added3 = date("M-d-Y", strtotime('Sunday'));
                    $sunday = date('l', strtotime('Sunday'));
                    $fyear = date ('Y');
                    
					
					include 'connections/db_connect.php';
                    $query11 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video WHERE day BETWEEN '$monday' AND '$sunday' AND year_uploaded = '$fyear' ";
                    $res11 = $con->query($query11);
                    
                    while($row11=$res11->fetch_assoc())
               {

               $weekly = $row11['count(id)'];
               
               }


               $weeklypercent = round(($weekly / $totalcount / 7 ) * 100,2);

              

				?>
                <label><b>Weekly Crime: <?php echo $weeklypercent;?>% </b></label> 
                
                <hr>
                <?php
				include 'connections/db_connect.php';
                   
                    
				$query1 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video WHERE day BETWEEN '$monday' AND '$sunday' AND year_uploaded ='$fyear' ";
				$res1 = $con->query($query1);
				?>
				        <p><?php
	while($row1=$res1->fetch_assoc())
	{
      echo " For the last 7 days:
       <br> To: <i style='background:#eee;'> $date_added3 ($sunday) </i>
       <br> From: <i> $date_added2 ($monday) </i>
       <br> Total Video Crimes as of this Week: ".$row1['count(id)']."
	 ";
	}
?>		
                &nbsp;<a href="#" class="beye"><i style="font-size:20px; float:right;" class="fa fa-caret-down"></i></a>
                <a href="#" class="bbeye"><i style="font-size:20px ; float:right;" class="fa fa-caret-up"></i></a>
               </p>
                <hr>
                <div class="bcategories">   
                <?php
				include 'connections/db_connect.php';

				$query = "SELECT video_category, count(video_category) FROM crime_video WHERE day BETWEEN '$monday' AND '$sunday' AND year_uploaded ='$fyear' group by video_category";
				$res = $con->query($query);
				?>

<?php
	while($row=$res->fetch_assoc())
	{
	echo " ".$row['video_category']." : ".$row['count(video_category)']."<br>";
	}


?>
               </div>
          </td>
          <td>
          <?php
			       date_default_timezone_set('Asia/Manila');
                      $flmonths = date('F');
                      $fday = date('d', strtotime ('first day of month'));
                      $lday = date('d', strtotime ('last day of month'));
                      $fyear = date ('Y');
                      
                     
                      include 'connections/db_connect.php';
                      $query12 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video WHERE month_uploaded='$flmonths' AND year_uploaded='$year'  ";
                      $res12 = $con->query($query12);
                      
                      while($row12=$res12->fetch_assoc())
                 {
  
                 $monthly = $row12['count(id)'];
                 
                 }
  
  
                 $monthlypercent = round(($monthly / $totalcount / 12 ) * 100,2);
  
                
  
                      ?>
                <label><b>Monthly Crime: <?php echo $monthlypercent;?>% </b></label> 
                <hr>
                <?php
				include 'connections/db_connect.php';
      
                    $fmonthdate = date('M-d-Y', strtotime('first day of this Month'));
                    $lmonthdate = date ('M-d-Y', strtotime('last day of this Month'));
                   
                   

				$query1 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video WHERE month_uploaded='$flmonths' AND year_uploaded='$year'  ";
				$res1 = $con->query($query1);
				?>
				        <p><?php
	while($row1=$res1->fetch_assoc())
	{
      echo " For the Month of: $dates
       <br> To: <i style='background:#eee;'> $lmonthdate </i>
       <br> From: <i> $fmonthdate </i>
       <br> Total Video Crimes as of this Month: ".$row1['count(id)']."
	 ";
	}
?>	
                 &nbsp;<a href="#" class="ceye"><i style="font-size:20px ; float:right;" class="fa fa-caret-down"></i></a>
                <a href="#" class="cceye"><i style="font-size:20px ; float:right;" class="fa fa-caret-up"></i></a>
               </p> 
                <hr>   
                <div class="ccategories">   
                <?php
				include 'connections/db_connect.php';

				$query = "SELECT video_category, count(video_category) FROM crime_video WHERE month_uploaded='$flmonths' AND year_uploaded='$year' group by video_category";
				$res = $con->query($query);
				?>

<?php
	while($row=$res->fetch_assoc())
	{
	echo " ".$row['video_category']." : ".$row['count(video_category)']."<br>";
	}


?>
               </div>
          </td>
          <td>
          <?php
			       
                      $flyearly = date('Y');
                      $fymonthly = date('M-d-Y', strtotime ('first day of January'));
                      $lymonthly = date('M-d-Y', strtotime ('last day of December'));

                      include 'connections/db_connect.php';
                      $query13 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video WHERE year_uploaded='$flyearly' ";
                      $res13 = $con->query($query13);
                      
                      while($row13=$res13->fetch_assoc())
                 {
  
                 $yearly = $row13['count(id)'];
                 
                 }
  
  
                 $yearlypercent = round(($yearly / $totalcount / 356 ) * 100,2);
  
                
  
                      ?>
                <label><b>Yearly Crime: <?php echo $yearlypercent;?>% </b></label>
                <p>
                <hr>
                <?php
				include 'connections/db_connect.php';
                    
                    
                   
				$query1 = "SELECT month_uploaded,day_uploaded,year_uploaded,  count(id) FROM crime_video WHERE year_uploaded='$flyearly' ";
				$res1 = $con->query($query1);
				?>
				        <p><?php
	while($row1=$res1->fetch_assoc())
	{
      echo "
       
       <br> To: <i style='background:#eee;'> $lymonthly </i>
       <br> From: <i> $fymonthly </i>
       <br> Total Video Crimes as of this Year: ".$row1['count(id)']."
	 ";
	}
?>	
           &nbsp;<a href="#" class="deye"><i style="font-size:20px; float:right;" class="fa fa-caret-down"></i></a>
                <a href="#" class="ddeye"><i style="font-size:20px; float:right;" class="fa fa-caret-up"></i></a>
               </p>
               <hr>  
                <div class="dcategories">   
                <?php
				include 'connections/db_connect.php';

				$query = "SELECT video_category, count(video_category) FROM crime_video WHERE year_uploaded='$flyearly' group by video_category";
				$res = $con->query($query);
				?>

<?php
	while($row=$res->fetch_assoc())
	{
	echo " ".$row['video_category']." : ".$row['count(video_category)']."<br>";
	}


?>
               </div>
          </td>
		  <?php
			include 'connections/db_connect.php';


			$sql="SELECT count(id) AS total FROM crime_video";
			$result=mysqli_query($con,$sql);
			$values=mysqli_fetch_assoc($result);
			$num_rows=$values['total'];

				?>
               <td>
                <label><b>Over All Crime:</b></label>  
                <hr>
				<i><p style="font-size: 14px;" id="date_time"></p></i>           
                <script type="text/javascript">window.onload = date_time('date_time');</script>
                <p><?php echo "<label>Overall Total Numbers of Video Crimes: ".$num_rows."</label>" ;?><br>
			&nbsp;<a href="#" class="eeye"><i style="font-size:20px; float:right;" class="fa fa-caret-down" ></i></a>
                <a href="#" class="eeeye"><i style="font-size:20px; float:right;" class="fa fa-caret-up"></i></a>
               </p>
			                  
                               
               </p>
                <hr>
                <div class="ecategories">   
                <?php
				include 'connections/db_connect.php';

				$query = "SELECT video_category, count(video_category) FROM crime_video group by video_category";
				$res = $con->query($query);
				?>

<?php
	while($row=$res->fetch_assoc())
	{
	echo " ".$row['video_category']." : ".$row['count(video_category)']."<br>";
	}


?>
               </div>  
          </td>
          </tr>
     </table>

   </div> 


     <hr>
     <h2>Graphical Representation of Data</h2>
     <hr>

 <div>
        <table border="color:1px solid gray" bordercolor=#eee cellpadding="30" cellspacing="0" class="table">
<!--Crime Video Percentage-->
<tr>
           
			<td>
                <h2>Percentage Graph</h2> 
				<i><p style="font-size: 14px;" id="date_time"></p></i>           
   
   
               <script type="text/javascript">window.onload = date_time('date_time');</script>

<!--paste yung para sa percentages-->
<?php
				include 'connections/db_connect.php';
				$query10 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video GROUP BY video_category";
                    $res10 = $con->query($query10);
                    
                    while($row10=$res10->fetch_assoc())
	          {
     
               $totalcount = $row10['count(id)'];
               
               }
     
                    include 'connections/db_connect.php';
                    $query10 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video WHERE month_uploaded='$month' AND day_uploaded='$day' AND year_uploaded='$year' ";
                    $res10 = $con->query($query10);
                    
                    while($row10=$res10->fetch_assoc())
               {

               $dailycount = $row10['count(id)'];
               
               }


               $percent = round(($dailycount / $totalcount / 1 ) * 100,2);

              

				?>
				<hr>
                <?php
				include 'connections/db_connect.php';
                  
                    $dates = date("F");
				$query1 = "SELECT month_uploaded,day_uploaded,year_uploaded, count(id) FROM crime_video WHERE month_uploaded='$month' AND day_uploaded='$day' AND year_uploaded='$year'";
				$res1 = $con->query($query1);
				?>

<!--end-->	
 <?php
include 'connections/db_connect.php';


$sql="SELECT count(id) AS total FROM crime_video";
$result=mysqli_query($con,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];

?>               
                <p><?php
				echo "<label>Overall Total Percentages of Videos:</label>" ;?> &nbsp;<a href="#" class="eeye"><i class="fa fa-video-camera" style="color:#595959; font-size: 1.9em;" aria-hidden="true"></i></a>
                </p>
<hr>
                <div class="categories">   

<?php
				include 'connections/db_connect.php';
				$q1 = "SELECT video_category, count(id) AS total FROM crime_video";
                $res1 = $con->query($q1);
                    
                    while($row1=$res1->fetch_assoc())
	          {
     
               $wholetotal = $row1['total'];
               }
     
				include 'connections/db_connect.php';

				$q2 = "SELECT video_category, count(video_category) FROM crime_video group by video_category";
				$res2 = $con->query($q2);
    
                    while($row2=$res2->fetch_assoc())
	          {
     
               $indtotal = $row2['count(video_category)'];
               echo " ".$row2['video_category']." : ".$row2['count(video_category)']."<br>";
               }

				$percentage = ($indtotal / $wholetotal) * 100;	   
				
				?>
               <!--echo $percentage;%-->






               </div>  


               
				
			</td>
          
		    <td><?php
			include ('charts/chart.php');
			?>
			</td>
</tr>
	<!--Crime Category-->		   
<tr>
			<td>
				<h2>Crime Category Graph</h2>
				<i><p style="font-size: 14px;" id="date_time"></p></i>           
   
   
               <script type="text/javascript">window.onload = date_time('date_time');</script>
 <?php
include 'connections/db_connect.php';


$sql="SELECT count(id) AS total FROM crime_video";
$result=mysqli_query($con,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];

?>               <hr>
                <p><?php
				echo "<label>Overall Total Numbers of Videos Per Categories:</label>" ;?> &nbsp;<a href="#" class="eeye"><i class="fa fa-line-chart " style="color:#0033cc; font-size: 1.9em;" aria-hidden="true"></i></a>
                </p>
<hr>
                <div class="categories">   

<?php
include 'connections/db_connect.php';

$query = "SELECT video_category, count(video_category) FROM crime_video group by video_category";
$res = $con->query($query);
?>

<?php
	while($row=$res->fetch_assoc())
	{
	echo " ".$row['video_category']." : ".$row['count(video_category)']."<br>";
	}


?>
               </div>  
				
				
				
			</td>
		  
			<td><?php
			include ('charts/line.php');
			?>
			</td>
</tr>
               
  <!--Yearly-->             
<tr>
			   
			<td>
			<h2>Yearly Graph</h2>
				<i><p style="font-size: 14px;" id="date_time"></p></i>           
   
   
               <script type="text/javascript">window.onload = date_time('date_time');</script>
 <?php
include 'connections/db_connect.php';


$sql="SELECT count(id) AS total FROM crime_video";
$result=mysqli_query($con,$sql);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];

?>               <hr>
                <p><?php
				echo "<label>Overall Total Numbers of Videos Per Year:</label>";?> &nbsp;<a href="#" class="eeye"><i class="fa fa-bar-chart" style="color:#004d00; font-size: 1.9em;" aria-hidden="true"></i></a>
                </p>
<hr>
                <div class="categories">   

<?php
include 'connections/db_connect.php';

$query = "SELECT year_uploaded, count(year_uploaded) FROM crime_video group by year_uploaded";
$res = $con->query($query);
?>

<?php
	while($row=$res->fetch_assoc())
	{
	echo " ".$row['year_uploaded']." : ".$row['count(year_uploaded)']."<br>";
	}



?>
               </div>  
			
			
			
			</td>
			
			<td><?php
			include ('charts/yearlybargraph.php');
			?>
			</td>


               
</tr>

<!--Location-->
<tr>
			   
                  <td>
                  <h2>Location Graph</h2>
                       <i><p style="font-size: 14px;" id="date_time"></p></i>           
      
      
                  <script type="text/javascript">window.onload = date_time('date_time');</script>
    <?php
   include 'connections/db_connect.php';
   
   
   $sql="SELECT count(id) AS total FROM crime_video";
   $result=mysqli_query($con,$sql);
   $values=mysqli_fetch_assoc($result);
   $num_rows=$values['total'];
   
   ?>               <hr>
                   <p><?php
                       echo "<label>Overall Total Crime Videos Per Location:</label>";?> &nbsp;<a href="#" class="eeye"><i class="fa fa-map-marker" style="color:#ff8080; font-size: 1.9em;" aria-hidden="true"></i><i style="font-size:20px; color:gray;"></i></a>
                   </p>
   <hr>
   
                   <div class="categories">   
   <?php
   include 'connections/db_connect.php';
   
   $query5 = "SELECT location, count(location) FROM crime_video group by location";
   $res5 = $con->query($query5);
   ?>
   
   <?php
        while($row=$res5->fetch_assoc())
        {
        echo " ".$row['location']." : ".$row['count(location)']."<br>";
        }
   
   
   
   ?>
                  </div>  
                  
                  
                  
                  </td>
                  
			<td><?php
			include ('charts/locationchart.php');
			?>
			</td>
   
                  
   </tr>
        </table>
   </div>

     <hr>
     <h2>ACCOUNTS</h2>
     <hr>

   <div >
<?php
			include 'connections/db_connect.php';


			$sql="SELECT count(id) AS total FROM registration";
			$result=mysqli_query($con,$sql);
			$values=mysqli_fetch_assoc($result);
			$num_rows=$values['total'];

				?>

        <table cellpadding="30" cellspacing="0" class="table">
               <tr>
               <td>
                <label><b>Approximately Created Accounts </b></label>  
                <i><p style="font-size: 14px;" id="date_time3"></p></i>
                <script type="text/javascript">window.onload = date_time('date_time3');</script>
          <p><?php echo "<label>Total Numbers of Accounts: ".$num_rows."</label>"?> <a href="#" class="eeye"><i style="font-size:20px; color:brown;" class="fa fa-users"></i></a>
                <a href="#" class="eeeye"><i style="font-size:20px" class="fa fa-arrow-up"></i></a>
               </p>
                <hr>
                  
          </td>
          <td>
 <p>Add Category</p>
 <form method="post">
<input type="text" name="addcat"> 
<button style="width:100px; color:white;" name="insert" type="submit">Submit</button>
</form>



<?php
require('connections/db_connect.php');
if(isset($_POST['insert']))
{

$category =($_POST['addcat']);

$query2 = "INSERT INTO `crime_category` (`id`, `crime_name`) VALUES ('', '$category')";
$result2 = mysqli_query($con, $query2);

if($result2)
{
echo '<script>alert("Data Succesfully Added!")</script>';

}else{
echo 'Data Not Inserted';
}
}
?>


          <?php
require('connections/db_connect.php');
$query3 = "SELECT * FROM `crime_category`"; 
$result3 = mysqli_query($con, $query3);
?>

<select name="cat">
	<?php while ($row1 = mysqli_fetch_array($result3)):;?>
	<option name="cat"><?php echo $row1[1];?></option>
	<?php endwhile;?>
</select>

          </td>
          
               </tr>
        </table>
   </div>


</div>


</body>
</html>