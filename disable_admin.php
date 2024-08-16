<?php

$id = $_GET['id'];
include 'connections/db_connect.php';

if(!$con){
    die("Connection failed". mysqli_connect_error());
}

$sql = "UPDATE admin_registration SET status = 'Disabled' WHERE admin_id = $id";

if(mysqli_query($con, $sql)){
    mysqli_close($con);
    header('Location: admin.php');
    exit;
} else {
    echo"Error";
}

?>