


<?php
	require_once 'connections/db_connect.php';
	
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
	
		
		$query = $con->query("SELECT * FROM `admin_registration` WHERE username='$username' and password='".md5($password)."'") or die(mysql_error());
		$rows = $query->num_rows;
		$fetch = $query->fetch_array();
																		
			if ($rows == 0) 
					{
						echo " <br><center><font color= 'red' size='3'>Please fill up the fields correctly</center></font>";
					} 
				else if ($rows > 0)
					{
					session_start();
					$_SESSION['id'] = $fetch['admin_id'];
					header("location:index.php");
				
			}	
	
	}
	?>