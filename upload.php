<html>
<head>
<title>Monitoring Officer</title>
<meta charset="utf-8" />
<script type="text/javascript" src="time.js"></script>
</head>

<body>
     
<br>
          

<form method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="submit" name="submit" value="Upload" />


<!--Diplay Table-->
<?php
require('connections/db_connect.php');
$query3 = "SELECT * FROM `crime_category`"; 
$result3 = mysqli_query($con, $query3);
?>

<select name="pakyow">
	<?php while ($row1 = mysqli_fetch_array($result3)):;?>
	<option name="pakyow"><?php echo $row1[1];?></option>
	<?php endwhile;?>
</select>



</form>

<script type="text/javascript">window.onload = date_time('date_time1');</script>
<!--uploading video-->
<?php
require('connections/db_connect.php');
if(isset($_POST['submit']))
{
	
$category = $_POST['pakyow'];
$name = $_FILES['file']['name'];
$temp = $_FILES['file']['tmp_name'];

$time_added = date("h:i:A");
$date_added = date("M-d-Y");
$sevendate = date('M-d-Y', strtotime('-7 days'));

date_default_timezone_set('Asia/Manila');
$month = date("F");
$day = date("d");
$year = date("Y");
$nod = date("l");
$time = date("h:i:A");


move_uploaded_file ($temp, "upload/".$name);
$query = "INSERT INTO `crime_video` (`id`, `video_name` , `video_category` , `month_uploaded` , `day_uploaded` , `year_uploaded` , `day` , `time_uploaded`, `uploaded_by`) VALUES (NULL, '$name', '$category', '$month', '$day', '$year', '$nod', '$time', 'user')";
$result = mysqli_query($con, $query);
if(mysqli_query($con, $result))
{
echo "Submitted to database...";
}
echo "<br>".$name."has been uploaded.";
}
?>

<!--for inserting value to dropdown-->





</body>
</html>