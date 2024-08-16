<?php
	$conn = new mysqli('localhost', 'root', '', 'capstone2018');
	
	if(!$conn){
		die("Error: Failed to connect to database");
	}
?>	