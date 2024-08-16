<!--THIS MODULE IS FOR MONITOING OFFICER LOGIN SECTION-->
 <!--including php file for validation-->
 <?php
require('logincheck_monitoring.php');
?>

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
      <h2>MONITORING OFFICER</h2>
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
      
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button class="submit" type="submit">Login</button>
     
    </div>

  </form>
</div>


</body>
</html>