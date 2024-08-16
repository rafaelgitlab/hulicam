

<?php require 'connections/db_connect.php';
	$query = $con->query("SELECT * from monitoring_registration where id ='$session_id'")or die (mysql_error ());
	while ($row = $query->fetch_array()){

?>	
	<img class="logo" src="./img/seal.png" >
	<hr>
	<center><font size="5pt">Barangay Socorro</font></center>
	<hr>
	<center><img src="./img/<?php echo $row['image']; ?>" style="height:120px; width:120px; border-radius:5px;"></center>
	<hr>	
	<a href="profile_monitoring.php"><?php echo $user_username = $user_row['firstname']." ".$user_row['lastname'];?><br>Monitoring<br>Officer</a>     		
	<hr>

     <a href="index_monitoring.php"><b>Live Videos Stream</b></a>

	<hr>
	
     <a  href="tracking.php"><b>Tracking</b></a>
	
	<hr>
 
			<?php } ?>
