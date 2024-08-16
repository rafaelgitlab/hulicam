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


<!--Mobile users whole content starts here-->

<!--database connection for mobile users-->
<?php
if(isset($_POST["submit1"]))
{
include 'connections/db_connect.php';

$res1=mysqli_query($con,"select * from registration where barangayid='$_POST[t1]'");
$count1=mysqli_num_rows($res1);
		
$password= $_POST['t3'];		
$confirmpassword= $_POST['t9'];	

date_default_timezone_set('Asia/Manila');
$date_added = date("M-d-Y");     
$time_added = date("h:i:A"); 

$found='false';


if($count1>0)
{
?>
<script type="text/javascript">
alert("This Barangay ID already registered!");
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
$pwd=md5 ($_POST['t3']);
mysqli_query($con,"INSERT INTO `registration` VALUES ('','$_POST[t1]','$pwd','$_POST[t4]','$_POST[t5]','$_POST[t6]','$_POST[r1]','$_POST[t7]','$_POST[t10]','$_POST[t8]','$date_added','$time_added','admin')");
?>
<script type="text/javascript">
alert("Successfully created an account!");
</script>
<?php
$found='false';			
}
}
?>
 
<!--end of database connection for mobile users-->
 




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
 
      <div class="modal-body">
                  
        <hr>
        <p style="font-size:20px;"><i></i><b>ADD NEW MOBILE USERS</b></p>  
        <hr>

      <form name="form1" action="" method="post">
        <div class="form-group">
            <label for="brgyid">Barangay ID:</label>
            <span class="input-group-text"><i class="fa fa-business-card"></i></span>
            <input type="text" class="form-control" name="t1" required pattern="^[0-9]+">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
            <input type="password" id="myInput" class="form-control" name="t3" required>
        </div>
       
        <div class="form-group">
            <label for="confirm">Confirm Password:</label>
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
            <input type="password" id="myInput1" class="form-control" name="t9" required>
        </div>

        <div class="form-group">
            <label for="fname">Firstname:</label>
            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
            <input type="text" class="form-control" name="t4" required>
        </div>

        <div class="form-group">
            <label for="mname">Middlename:</label>
            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
            <input type="text" class="form-control" name="t5" required>
        </div>

        <div class="form-group">
            <label for="lname">Lastname:</label>
            <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
            <input type="text" class="form-control" name="t6" required>
        </div>

                
        <div class="form-group">
        <label class="form-check-label" for="radio1">
                Select Gender:
            </label>
        </div>

                
        <div class="form-group">
        <div class="form-check-inline">
            <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="radio1" name="r1" value="Male" checked>Male
            </label>
            </div>
        <div class="form-check-inline">
            <label class="form-check-label" for="radio2">
                <input type="radio" class="form-check-input" id="radio2" name="r1" value="Female">Female
            </label>
          </div>
        </div>

        <div class="form-group">
            <label for="contact">Contact No:</label>
            <span class="input-group-text"><i class="fa fa-phone-square"></i></span>   
             <input type="text" class="form-control" name="t7" required pattern="^[0-9]+">
        </div>
		
		<div class="form-group">
            <label for="email">Email:</label>
            <span class="input-group-text"><i class="fa fa-phone-square"></i></span>   
             <input type="email" class="form-control" name="t10" required>
        </div>

        <div class="form-group">
             <label for="address">Home Address:</label>
            <span class="input-group-text"><i class="fa fa-address-card"></i></span>
          <input type="text" class="form-control" name="t8" required>
        </div>
     
        <div align="center">
        <button style="color:white;" name="submit1"><b>Register</b></button>
        </div>

    </form>
    </div>



</div>
</div>
</div>

<!--mobile users account-->

	<form action="login.php">
	<button style="border-radius:1px;width:150px; color:white; float:right;"  type="submit" class="btn btn-dark"><b>Logout</b></button>
	</form>

<p style="font-size:20px;"><b>MANAGE ACCOUNTS</b></p>  
<hr>
<p style="font-size:20px;"><b>ACCOUNTS FOR MOBILE USERS</b></p>  
<hr>

  
<table id="tbl" class="table">
    <thead>
        <tr>
		    <th><a href="#">ID</a></th>
            <th><a href="#">Barangay-ID</a></th>
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
            <th><button style="color:white;" data-target='#myModal' data-toggle='modal' class='adac'><b>+ Add</b></button></th>
           
        </tr>
    </thead>

    <tbody>

     <?php
    
     include 'connections/db_connect.php';
     $result = mysqli_query($con,"SELECT * FROM `registration` ORDER BY `id` desc");

     while($row = mysqli_fetch_assoc($result)):
     
     ?>
 
     <tr>
    
        
         <td><?php echo $row['id'];?></td>
		 <td><?php echo $row['barangayid'];?></td>
         <td><?php echo $row['firstname'];?></td>
         <td><?php echo $row['middlename'];?></td>
         <td><?php echo $row['lastname'];?></td>
         <td><?php echo $row['gender'];?></td>
         <td><?php echo $row['contactno'];?></td>
		 <td><?php echo $row['email'];?></td>
         <td><?php echo $row['address'];?></td>
         <td><?php echo $row['dateadded'];?></td>
         <td><?php echo $row['timeadded'];?></td>
         <td><?php echo $row['addedby'];?></td>
         <?php
         echo "<td>"; 
         echo "<a href='edit1.php?id= ".$row['id']."'><span class='fa fa-power-off'></span> Disable </a>";
         echo "</td>";
         ?>
    
      </tr>
 
     <?php endwhile; ?>

</table>
<!--mobile users accounts end-->

<!--Mobile users whole content ends here-->




</div>






<script src="tables/js/jquery.js"></script>
<script src="tables/js/jquery.dataTables.js"></script>
<script src="tables/js/dataTables.bootstrap.js"></script>

<!--pagination per tables-->
<script>
      
$('#tbl').dataTable( {
    "order": [[ 0, 'desc' ]]
} );
     


</script>


</body>
</html>