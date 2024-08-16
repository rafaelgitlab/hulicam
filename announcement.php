<?php include ('session.php');

$_SESSION['callFrom'] = "announcement.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta content="120; URL=index.php">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/seal.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="./js/index.js"></script>
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

           
                         <table class="table-responsive">
                         <p style="font-size:20px;"><i></i><b>ANNOUNCEMENTS</b></p>  


<table class="table-responsive">            
                        <div class="form-group">
                        <form action="" method="post">
                        <label for="ann">Write Message:</label>
                        <textarea style="width:100%;" class="form-control" rows="5" id="ann" name="ann" required></textarea>  
                        Written by Admin <p style="font-size: 14px;" id="date_time"></p> <script type="text/javascript">window.onload = date_time('date_time');</script>
                        <center><button style="border-radius:1px;width:200px; color:white;" onclick="myFunction()" style="color:white;"type="submit" name="submit" class="btn btn-dark"><span class="fa fa-sticky-note"></span><b> Post Announcement</b></button></center>
                        </form>
                        </div>
</table>
                         <hr>




                         <div class="form-group">
                             <form action="" method="GET">
                           <b>Search:</b><input type="text" type="submit" name="search" class="form-control" style="border-radius:1px;width:59%; color:white;">                               
                        </div>
                        </form>
                            <br>
                        </table>

                        <div style="overflow-y: auto; overflow-x: auto;" id="maincontent1">

<?php 
require('connections/db_connect.php');
if( $con->connect_error){
   die('Error: ' . $con->connect_error);
} 
$sql = "SELECT * FROM announcement_tbl ORDER BY id DESC";


if( isset($_GET['search']) ){  
  $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search'])); 
  $sql = "SELECT * FROM announcement_tbl WHERE posted_by LIKE '%".($_GET['search'])."%'
  or ann_msg LIKE '%".($_GET['search'])."%' 
  or date_posted LIKE '%".($_GET['search'])."%'
  or time_posted LIKE '%".($_GET['search'])."%'
  ORDER BY id DESC"; 
} 

$result = $con->query($sql);

echo "
<table style='width:100%' class='table table-striped'>
<tr>

</tr>
";
if(mysqli_num_rows($result)>0) {
  

while($row = mysqli_fetch_array($result))
{

    echo "<tr>";
    echo "<td style='background:#eee'>";
    echo "<p> <span class='fa fa-user'></span> " . $row['status'] . ' by : '  . $row['posted_by'] .  "</p>"; 
    echo "<p>  Date: " . $row['date_posted'] . ' <span class="fa fa-clock-o"></span> ' . $row['time_posted'] .  "</p>"; 
    echo "</td>";   


    echo "</tr>";

    echo "<tr>";
   

    echo "<td width='70%' height='100'>"; 
    echo "<p></p> <p style='float: right;'><a style='color:#800;' href='delete.php?id= ".$row['id']."'> <span class='fa fa-trash'></span></a> </p>  <span class='fa fa-bullhorn'></span> Greetings from Barangay Socorro : <hr> " . $row['ann_msg'] . " </p>"; 
    echo "</td>"; 
    echo "</tr>";
    
}

} else {
    echo "<tr> <td colspan='2'> No Results found.. </td></tr>";
}

echo "</table>";



mysqli_close($con);
?>
 
</div>

 
                        <hr>

<?php  
require('connections/db_connect.php');

if(isset($_POST["submit"])){ 

       date_default_timezone_set('Asia/Manila');
       $ann = stripslashes($_POST['ann']); 
       $ann = mysqli_real_escape_string($con,$ann);    
       $date_posted = date("M-d-Y");     
       $time_posted = date("h:i:A"); 
    
       $query = "INSERT INTO `announcement_tbl`(`posted_by`, `ann_msg`, `date_posted`, `time_posted`, `status`) VALUES ( '$username', '$ann', '$date_posted', '$time_posted', '$status')";
       $result = mysqli_query($con,$query); 

       echo "<script>
       alert('Successfully Posted!');
       window.location.href='announcement.php';
       </script>";
       
       mysqli_close($con);        
       
}




?>
                    </div>

                    </div>
                </div>
            </div>
    

</body>
</html>