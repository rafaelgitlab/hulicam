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
      <input type="text" placeholder="Enter your favorite color" name="username" required>
      
      <button class="submit" type="submit" name="find">Find</button>
	
     
    </div>
				<?php include ('find_query_monitoring.php');?>
  </form>
</div>


</body>
</html>