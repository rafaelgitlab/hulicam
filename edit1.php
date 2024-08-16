<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="120; URL=index.php">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/seal.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    $('#myModal').hide();
    $('#show').hide();
    $('#show1').hide();

     $(".adac").click(function(){
        $("#myModal").slideToggle();
        
    });


    $("#hide").click(function(){
        $("#show").slideToggle();
        $("#hide").hide();
    });

     $("#show").click(function(){
        $("#hide").slideToggle();
        $("#show").hide();
    });

    
    $("#hide1").click(function(){
        $("#show1").slideToggle();
        $("#hide1").hide();
    });

     $("#show1").click(function(){
        $("#hide1").slideToggle();
        $("#show1").hide();
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
 
<div class="main2">
                
<?php

$id = $_GET['id'];
include 'connections/db_connect.php'; 
 $sql = "SELECT * FROM registration WHERE id = $id";
 $result = $con->query($sql);

 if(mysqli_num_rows($result)>0) {
          
    while($row = mysqli_fetch_array($result))
    {
        
        $fn = "$row[firstname]";
        $mn = "$row[middlename]";
        $ln = "$row[lastname]";
        $address = "$row[address]";
        $brgyid = "$row[barangayid]";
        

      
    }
}
    ?>
    <hr>
    <h2>EDIT ACCOUNT DETAILS</h2>
    <hr>

         <div class="form-group">
                            <form action="" method="post">
						
                        <div class="form-group">
                        <label>Firstname:</label>
                        <input type="text" class="form-control" name="fn" value="<?php echo $fn ?>">
                        </div>
                        <div class="form-group">
                        <label>Middlename:</label>
                        <input type="text" class="form-control" name="mn" value="<?php echo $mn ?>">
                        </div>
                        <div class="form-group">
                        <label>Lastname:</label>
                        <input type="text" class="form-control" name="ln" value="<?php echo $ln ?>">
                        </div>
                        <div class="form-group">
                        <label>Address:</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $address ?>">
                        </div>
                        <div class="form-group">
                        <label>Barangay ID:</label>
                        <input type="text" class="form-control" name="brgyid" value="<?php echo $brgyid ?>">
                        </div>
                        <button style="width: 100px; float:left; color:white;" type="submit" name="submit"><b>Submit</b></button>

                            </form>

                            <form action="accounts.php">
                            <a href="accounts.php"><button type="submit" style="width: 100px; float:right; color:white;"><b>Cancel</b></button></a>
                            </form>
                        </div>
						

<?php  

$id = $_GET['id'];
require 'connections/db_connect.php';

 if(isset($_POST["submit"])){ 
        
         $date_edited = date("M-d-Y");     
         $time_edited = date("h:i:A"); 
        $fn = stripslashes($_POST['fn']); 
        $fn = mysqli_real_escape_string($con,$fn);

        $mn = stripslashes($_POST['mn']); 
        $mn = mysqli_real_escape_string($con,$mn);

        $ln = stripslashes($_POST['ln']); 
        $ln = mysqli_real_escape_string($con,$ln);

        $address = stripslashes($_POST['address']); 
        $address = mysqli_real_escape_string($con,$address);

        $brgyid = stripslashes($_POST['brgyid']); 
        $brgyid = mysqli_real_escape_string($con,$brgyid);


       
       
      
$sql = "UPDATE registration SET barangayid =  '$brgyid', firstname = '$fn', middlename = '$mn', lastname = '$ln', address = '$address' WHERE id = $id";

if(mysqli_query($con, $sql)){
   
    echo "<script>
    alert('Successfully Edited!');
    window.location.href='accounts.php';
    </script>";

    mysqli_close($con);
} else {
    echo"Error";
}

 }
 
 ?>  
         
        </div>
    

</body>
</html> 
