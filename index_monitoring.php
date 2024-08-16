<?php include ('session_monitoring.php');

$_SESSION['callFrom'] = "index_monitoring.php";
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/seal.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
  
<div class="sidenav">
<?php
include 'sidenav_monitoring.php';
?>
</div>
 
<div class="main">

	<form action="login_monitoring.php" id="logout">
	<button style="border-radius:1px;width:150px; color:white; float:right;"  type="submit" class="btn btn-dark" ><span class="fa fa-sign-out"></span><b>Logout</b></button>
	</form>


<p style="font-size:20px;"><i></i><b>Monitoring Officer Interface </b></p>  
<hr>
<table id="tbl" class="table">
    <thead>
        <tr>
            <th><a href="#">Video</a></th>
            <th><a href="#">Video-Category</a></th>
            <th><a href="#">Month</a></th>
            <th><a href="#">Day</a></th>
            <th><a href="#">Year</a></th>
            <th><a href="#">Time</a></th>
            <th><a href="#">Days of Week</a></th>
            <th><a href="#">Uploaded-By</a></th>
           
        </tr>
    </thead>

    <tbody>
   
     <?php
    
	include 'connections/db_connect.php';
	$result = mysqli_query($con,"SELECT * FROM crime_video order by id desc");
 
	while($row = mysqli_fetch_assoc($result)):
     
     ?>
 
     <tr>
     <td>
              <?php echo "
         <video preload='true' loop='loop' muted='muted' volume='0' style='background:black;' width='205' height='105' controls>
         <source src='upload/".$row['video_name']."#t=0.5' type='video/webm'></video>
               ";
               ?>
     </td>
        
         <td><?php echo $row['video_category'];?></td>
         <td><?php echo $row['month_uploaded'];?></td>
         <td><?php echo $row['day_uploaded'];?></td>
         <td><?php echo $row['year_uploaded'];?></td>
         <td><?php echo $row['time_uploaded'];?></td>
         <td><?php echo $row['day'];?></td>
         <td><?php echo $row['uploaded_by'];?></td>
    
      </tr>
 
     <?php endwhile; ?>

</table>


<?php
require('connections/db_connect.php');
if(isset($_POST['insert']))
{

$category =($_POST['category']);

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



</div>


<script src="tables/js/jquery.js"></script>
<script src="tables/js/jquery.dataTables.js"></script>
<script src="tables/js/dataTables.bootstrap.js"></script>


<script>
      
     
      $('#tbl').dataTable( {
          "order": [[ 0, 'desc' ]]
      } );
      
      
      $('#tbl2').dataTable( {
          "order": [[ 0, 'desc' ]]
      } );
      
      
</script>

</body>
</html>