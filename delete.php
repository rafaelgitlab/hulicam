<?php

$id = $_GET['id'];
include('db_connect.php');

if(!$con){
    die("Connection failed". mysqli_connect_error());
}

$sql = "DELETE FROM announcement_tbl WHERE id=$id";

if(mysqli_query($con, $sql)){
    
    echo "<script>
    alert('Successfully Deleted!');
    window.location.href='announcement.php';
    </script>";

    mysqli_close($conn);
    exit;
} else {
    echo"Error";
}

?>