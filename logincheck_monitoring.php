<!--Checking login for monitoring officer-->

<?php
include('connections/db_connect.php');
if (isset($_POST['username'])){   
    $username = stripslashes($_REQUEST['username']);   
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $query = "SELECT * FROM `monitoring_registration` WHERE username='$username' and password='$password'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if($rows==1){
    $_SESSION['username'] = $username;
    $message = "Succesfully Login!";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='index_monitoring.php'
        </script>";
    }else{
        $message = "Wrong Username or Password!";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='login_monitoring.php'
        </script>";
    }
}else{}
    ?>
