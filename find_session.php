<?php
	require 'connections/db_connect.php';
	session_start(); 
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) { ?>
		<script>
			window.location = "find_username.php";
		</script>
<?php 
	}
		$session_id=$_SESSION['id'];
		$user_query = $con->query("SELECT * FROM admin_tbl WHERE admin_id = '$session_id'") or die(mysqli_errno());
		$user_row = $user_query->fetch_array();
		$user_username = $user_row['firstname']." ".$user_row['lastname'];
?>