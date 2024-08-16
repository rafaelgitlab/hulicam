<?php include ('session_monitoring.php');

$_SESSION['callFrom'] = "tracking.php";
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

<p style="font-size:20px;"><i></i><b>Tracking Location</b></p>  
<hr>


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