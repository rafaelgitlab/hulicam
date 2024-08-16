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
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
      
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button class="submit" type="submit" name="login">Login</button>
	<center><a href="find_username.php" style="font-size:25px; color:red;">Forgot Password?</a></center>
     
    </div>
				<?php include ('login_query.php');?>
  </form>
</div>


</body>
</html>