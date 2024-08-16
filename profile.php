<?php include ('session.php');

$_SESSION['callFrom'] = "profile.php";
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


<div class="main">

	<form action="login.php" id="logout">
	<button style="border-radius:1px;width:150px; color:white; float:right;"  type="submit" class="btn btn-dark" ><span class="fa fa-sign-out"></span><b>Logout</b></button>
	</form>

     <h2>Profile</h2>

<?php 
	require 'connections/db_connect.php';
	$bool = false;
	$query = $con->query("SELECT * FROM admin_registration where admin_id = '$session_id'");
	while($row = $query->fetch_array()){
	$admin_id=$row['admin_id'];
?>	 

   <div >
        <table cellpadding="30" cellspacing="0" class="table">
               <td>
                <label><b>Image </b></label>  
                <hr>
				<i><img src="./img/<?php echo $row['image']; ?>" width="75" height="75"></i>
                </p>
        
                  
          </td>
		  
		  <td>
                <label><b>Fullname </b></label>  
                <hr>
				<i><p style="font-size: 14px;"><?php echo $row ['firstname']." ".$row ['middlename']." ".$row ['lastname'];?></p></i>
                </p>
             
                  
          </td>

		  <td>
                <label><b>Gender </b></label>  
                <hr>
				<i><p style="font-size: 14px;"><?php echo $row ['gender'];?></p></i>
                </p>
             
                  
          </td>
		  
		  <td>
                <label><b>Contact </b></label>  
                <hr>
				<i><p style="font-size: 14px;"><?php echo $row ['contact'];?></p></i>
                </p>
             
                  
          </td>
		  
		  
		  <td>
                <label><b>Email </b></label>  
                <hr>
				<i><p style="font-size: 14px;"><?php echo $row ['email'];?></p></i>
                </p>
             
                  
          </td>
		  
		  <td>
                <label><b>Address </b></label>  
                <hr>
				<i><p style="font-size: 14px;"><?php echo $row ['address'];?></p></i>
                </p>
             
                  
          </td>
		  
		  
		  <td>
                <label><b>Your Security Question </b></label>  
                <hr>
				<i><p style="font-size: 14px;"><?php echo $row ['security_question'];?></p></i>
                </p>
          </td>
		  
		  <td>
                <label><b>Your Answer </b></label>  
                <hr>
				<i><p style="font-size: 14px;"><?php echo $row ['answer'];?></p></i>
                </p>
          </td>
		      
        </table>
		<hr>
   </div>
</div>

			 <?php } ?>

</body>
</html>










