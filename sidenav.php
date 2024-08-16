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
<script>


$(document).ready(function(){   
        $(".accounts").hide();
		$(".fa-caret-up").hide();
		$(".fa-caret-down").show();
	

	
	

	$(".fa-caret-down").click(function(){
        $(".accounts").slideToggle();
        $(".fa-caret-up").show();
		$(".fa-caret-down").hide();

	});

	$(".fa-caret-up").click(function(){
		 $(".accounts").slideToggle();
        $(".fa-caret-up").hide();
		$(".fa-caret-down").show();

	});


	
	
});


</script>
</head>
<body>



<?php

	require 'connections/db_connect.php';
	$query = $con->query("SELECT * from admin_registration where admin_id ='$session_id'")or die (mysql_error ());
	while ($row = $query->fetch_array()){

?>	
	<img class="logo" src="./img/seal.png" >
	<hr>
	<center><b>Barangay Socorro</b></center>
	<hr>
	<center><img src="./img/<?php echo $row['image']; ?>" style="height:120px; width:120px; border-radius:5px;"></center>	
	<a href="profile.php" id="hidden-print"><b>View Profile</b></a>
    <hr>
    <center><?php echo $user_username = $user_row['firstname']." ".$user_row['lastname'];?><br><b>Admin</b></center>
	<hr>
         <a href="index.php"><b>Home</b></a>
    <hr>
         <a href="announcement.php"><b>Announcements</b></a>
    <hr>

		 <a href="#" class="openaccount"><i style="font-size:20px ; float:right;" class="fa fa-caret-down"></i><i style="font-size:20px ; float:right;" class="fa fa-caret-up"></i><b>Manage Accounts</b></a>
		<div class="accounts">	 
				    <hr>
				  <a  href="mobile_user.php" class=""><b>Mobile Accounts</b></a>
				  <hr>
				  <a  href="monitoring.php" class=""><b>Monitoring Accounts</b></a>
				  <hr>
				  <a  href="admin.php" class=""><b>Admin Accounts</b></a>
  
		</div>
	<hr>
         <a  href="uploadedvideos.php"><b>Uploaded Videos</b></a>
    <hr>
        <a href="reports.php"><b>Reports</b></a>
    <hr>

 
			<?php } ?>

</body>
</html>