<!--THIS MODULE IS FOR ADMIN OFFICER LOGIN SECTION-->
 <!--including php file for validation-->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="img/seal.png">
<link rel="stylesheet" href="./css/admin.css">
<script src="./js/admin.js"></script>
</head>
<body>

<div id="id01" class="modal">
  
  <form class="modal-content animate" method="POST">
    <div class="imgcontainer">
      <img src="./img/seal.png" alt="Avatar" class="avatar">
      <h2>WEB SURVEILLANCE</h2>
    </div>

    <div class="container">
      <label><b>Select Your Security Question</b></label>

<?php
require('connections/db_connect.php');
$query3 = "SELECT * FROM `security_question`"; 
$result3 = mysqli_query($con, $query3);
?>

<br>

<select name="security" style="padding:10px;">
	<?php while ($row1 = mysqli_fetch_array($result3)):;?>
	<option name="security"><?php echo $row1[1];?></option>
	<?php endwhile;?>
</select>


      <input type="text" placeholder="Enter your answer" name="answer" required>
      
      <button class="submit" type="submit" name="find">Find</button>
	
     
    </div>
				<?php include ('find_query.php');?>
  </form>
</div>


</body>
</html>