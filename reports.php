<?php include ('session.php');

$_SESSION['callFrom'] = "reports.php";
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
  


<div class="sidenav">


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
    <div  id="hidden-print">
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
			</div>
            </div>
</div>


<div class="main" horizontalscroll="none">

	<form action="login.php" id="logout">
	<button style="border-radius:1px;width:150px; color:white; float:right;"  type="submit" class="btn btn-dark" ><span class="fa fa-sign-out"></span><b>Logout</b></button>
	</form>

<p style="font-size:20px;"><i></i><b>REPORTS</b></p>  


<table id="tbl" class="table">
    <thead>
        <tr>
            <th><a href="#">Video-Category</a></th>
            <th><a href="#">Month</a></th>
            <th><a href="#">Day</a></th>
            <th><a href="#">Year</a></th>
            <th><a href="#">Time</a></th>
            <th><a href="#">Days of Week</a></th>
            <th><a href="#">Uploaded-By</a></th>
            <th><a href="#">Location</a></th>
        </tr>
    </thead>

    <tbody>
    <?php
    
    include 'connections/db_connect.php';
    $result = mysqli_query($con,"SELECT * FROM crime_video order by id desc");

    while($row = mysqli_fetch_assoc($result)):

    ?>

    <tr>
        <td><?php echo $row['video_category'];?></td>
        <td><?php echo $row['month_uploaded'];?></td>
        <td><?php echo $row['day_uploaded'];?></td>
        <td><?php echo $row['year_uploaded'];?></td>
        <td><?php echo $row['time_uploaded'];?></td>
        <td><?php echo $row['day'];?></td>
        <td><?php echo $row['uploaded_by'];?></td>
        <td><?php echo $row['location'];?></td>
     </tr>

    <?php endwhile; ?>
</tbody>  
</table>

<script language="javascript" > 
                if (window.print) {
                document.write('<form><button style="border-radius:1px;width:150px; color:white; float:right;" id="print" class="btn btn-primary" type="button" name="print" onClick="window.print()"><span class="fa fa-print" ></span> Print</button></form>');
        }
                </script>
           
<style>
@media print {
	

   .hidden-print{
    display: none !important;
  }
  
  #hidden-print{
    display: none !important;
  }
  
  #print{
	  display: none !important;
  }
  
  #logout{
	  display: none !important;
  }
}
</style>


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


