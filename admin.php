<?php include ('session.php');

$_SESSION['callFrom'] = "accounts.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/seal.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src ="js/jquery/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
   
    $('#show').hide();
    $('#show1').hide();



     $("#show").click(function(){
        $("#hide").slideToggle();
        $("#show").hide();
    });

    
     $("#show1").click(function(){
        $("#hide1").slideToggle();
        $("#show1").hide();
    });


	
	
    $("#hide").click(function(){
        $("#show").slideToggle();
        $("#hide").hide();
    });
	
    $("#hide1").click(function(){
        $("#show1").slideToggle();
        $("#hide1").hide();
    });


  
});
</script>
<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }}

function myFunction1() {
    var x = document.getElementById("myInput1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }}

  </script>

</head>

<body>



<div class="sidenav">
<?php
include 'sidenav.php';
?>
</div>


<div class="main">


<?php
if(isset($_POST["submit3"]))
{
include 'connections/db_connect.php';

$res3=mysqli_query($con,"select * from admin_registration where contact='$_POST[s4]'");
$count3=mysqli_num_rows($res3);
    
$password= $_POST['s8'];		
$confirmpassword= $_POST['s9'];	

date_default_timezone_set('Asia/Manila');
$date_added = date("M-d-Y");     
$time_added = date("h:i:A"); 


$found='false';


if($count3>0)
{
?>
<script type="text/javascript">
alert("Contact already registered!");
</script>

<?php
$found='true';			
}

elseif($password!=$confirmpassword)
{
?>
<script type="text/javascript">
alert("Confirm Password do not match!");
</script>
<?php
$found='true';			
}


else
{
$pwd3=md5 ($_POST['s8']);
mysqli_query($con,"INSERT INTO `admin_registration` VALUES ('','','$_POST[s1]','$_POST[s2]','$_POST[s3]','$_POST[gender]','$_POST[s4]','$_POST[s5]','$_POST[s6]','$_POST[s7]','$pwd3','$_POST[security]','$_POST[answer]','$date_added','$time_added','Admin')");
?>
<script type="text/javascript">
alert("Successfully created an account for admin!");
</script>
<?php
$found='false';			
}
}
?>




<!--modal for admin officers-->



<!-- Modal -->
<div id="myModal3" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
 
<div class="modal-body">
                  
        <hr>
        <p style="font-size:20px;"><i></i><b>ADD NEW ADMIN OFFICERS</b></p>  
        <hr>

    <form name="form1" action="" method="post">

		
		<div class="form-group">
            <label for="fname">Firstname:</label>
            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
            <input type="text" class="form-control" name="s1" required>
        </div>

        <div class="form-group">
            <label for="mname">Middlename:</label>
            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
            <input type="text" class="form-control" name="s2" required>
        </div>

        <div class="form-group">
            <label for="lname">Lastname:</label>
            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
            <input type="text" class="form-control" name="s3" required>
        </div>

        <div class="form-group">
			<div class="form-check-inline">
            <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="radio1" name="gender" value="Male" checked>Male
            </label>
            </div>
			
			<div class="form-check-inline">
            <label class="form-check-label" for="radio2">
                <input type="radio" class="form-check-input" id="radio2" name="gender" value="Female">Female
            </label>
			</div>
        </div>        
		
		<div class="form-group">
            <label for="contact">Contact No:</label>
            <span class="input-group-text"><i class="fa fa-phone-square"></i></span>   
             <input id="contact" type="text" class="form-control" name="s4" required pattern="^[0-9]+">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <span class="input-group-text"><i class="fa fa-phone-square"></i></span>   
             <input type="email" class="form-control" name="s5" required>
        </div>
		
		<div class="form-group">
            <label for="address">Address:</label>
            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
            <input type="text" class="form-control" name="s6" required>
        </div>


        <div class="form-group">
            <label for="username">Username:</label>
            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
            <input type="text" class="form-control" name="s7" required>
        </div>



        <div class="form-group">
            <label for="password">Password:</label>
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
            <input type="password" id="myInput" class="form-control" name="s8" required>
        </div>

        <div class="form-group">
            <label for="confirm">Confirm Password:</label>
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
            <input type="password" id="myInput1" class="form-control" name="s9" required>
        </div>

		<div class="form-group">
            <label for="security">Select Your Security Question:</label>

<?php
require('connections/db_connect.php');
$query3 = "SELECT * FROM `security_question`"; 
$result3 = mysqli_query($con, $query3);
?>

<br>

		<select name="security">
		<?php while ($row1 = mysqli_fetch_array($result3)):;?>
		<option name="security"><?php echo $row1[1];?></option>
		<?php endwhile;?>
		</select>
		</div>
		
		<div class="form-group">
            <label for="answer">Answer</label>
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
		<input type="text" placeholder="Enter your answer" name="answer" required>
        </div>

        <div align="center">
        <button style="color:white;" name="submit3"><b>Register</b></button>
        </div>

    </form>

			</div>
 
		</div>

	</div>
</div>


<!--admin accounts-->
	<form action="login.php">
	<button style="border-radius:1px;width:150px; color:white; float:right;"  type="submit" class="btn btn-dark"><b>Logout</b></button>
	</form>

<p style="font-size:20px;"><b>MANAGE ACCOUNTS</b></p>
<hr>
<p style="font-size:20px;"><i></i><b>ACCOUNTS FOR ADMIN OFFICERS</b></p>  
<hr>
<table id="tbl3" class="table">
    <thead>
        <tr>
            <th><a href="#">ID</a></th>
			<th><a href="#">Firstname</a></th>
            <th><a href="#">Middlename</a></th>
            <th><a href="#">Lastname</a></th>
			<th><a href="#">Gender</a></th>
            <th><a href="#">Contact-No</a></th>
			<th><a href="#">Email</a></th>
			<th><a href="#">Address</a></th>
            <th><a href="#">Date-Added</a></th>
            <th><a href="#">Time-Added</a></th>
            <th><a href="#">Added-By</a></th>
            <th><a href="#">Status</a></th>
            <th><button style="color:white;" data-target='#myModal3' data-toggle='modal' class='adac'><b>+ Add</b></button></th>
           
        </tr>
    </thead>

    <tbody>
   
     <?php

     include 'connections/db_connect.php';
     $result = mysqli_query($con,"SELECT * FROM admin_registration ORDER BY admin_id desc");
 
     while($row = mysqli_fetch_assoc($result)):
     
     ?>
 
     <tr>
    
        
         <td><?php echo $row['admin_id'];?></td>
         <td><?php echo $row['firstname'];?></td>
         <td><?php echo $row['middlename'];?></td>
         <td><?php echo $row['lastname'];?></td>
		 <td><?php echo $row['gender'];?></td>
         <td><?php echo $row['contact'];?></td>
		 <td><?php echo $row['email'];?></td>
         <td><?php echo $row['address'];?></td>
		 <td><?php echo $row['date_added'];?></td>
         <td><?php echo $row['time_added'];?></td>
         <td><?php echo $row['added_by'];?></td>
         <td><?php echo $row['status'];?></td>         
         <?php
         echo "<td>"; 
         echo "<a href='disable_admin.php?id= ".$row['admin_id']."'><span class='fa fa-power-off'></span> Disable </a>";
         echo "</td>";
         ?>

      </tr>
 
     <?php endwhile; ?>
</tbody>
</table>


</div>






<script src="tables/js/jquery.js"></script>
<script src="tables/js/jquery.dataTables.js"></script>
<script src="tables/js/dataTables.bootstrap.js"></script>

<!--pagination per tables-->
<script>
      

$('#tbl3').dataTable( {
    "order": [[ 0, 'desc' ]]
} );


</script>


</body>
</html>