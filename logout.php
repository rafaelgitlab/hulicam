<?php
include('dbcon.php');
include('session.php');
session_destroy();
unset($_SESSION);
header('location: login.php'); 
?>