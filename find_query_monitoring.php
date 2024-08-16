<?php
require_once 'connections/db_connect.php';
	
	if(isset($_POST['find']))
	{
		$username=$_POST['username'];
		
	
		
		$query = $con->query("SELECT * FROM `monitoring_registration` WHERE username='$username'") or die(mysql_error());
		$rows = $query->num_rows;
		$fetch = $query->fetch_array();
																		
			if ($rows == 0) 
					{
						echo " <br><center><font color= 'red' size='3'>Please fill up the fields correctly</center></font>";
					} 
				else if ($rows > 0)
					{
					session_start();
					$_SESSION['id'] = $fetch['id'];
					header("location:forgot.php");
				
			}	
	
	}
	?>