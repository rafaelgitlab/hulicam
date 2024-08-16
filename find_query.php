<?php
require_once 'connections/db_connect.php';
	
	if(isset($_POST['find']))
	{
		$answer=$_POST['answer'];
		$security=$_POST['security'];
	
		
		$query = $con->query("SELECT * FROM `admin_registration` WHERE security_question='$security' and answer='$answer'") or die(mysql_error());
		$rows = $query->num_rows;
		$fetch = $query->fetch_array();
																		
			if ($rows == 0) 
					{
						echo " <br><center><font color= 'red' size='3'>Wrong Data!</center></font>";
					} 
				else if ($rows > 0)
					{
					session_start();
					$_SESSION['id'] = $fetch['admin_id'];
					header("location:index.php");
				
			}	
	
	}
	?>