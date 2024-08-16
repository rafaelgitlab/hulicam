<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
 
      <div class="modal-body">
                  
        <hr>
        <p style="font-size:20px;"><i></i><b><i class="fa fa-user"></i>Profile</b></p>  
        <hr>

      <form name="form1" action="" method="post">
        <div class="form-group">
            <label for="brgyid">Firstname:</label>
            <span class="input-group-text"><i class="fa fa-pencil"></i></i></span>
            <input type="text" class="form-control" name="firstname" required pattern="^[A-Za-z0-9]+">
        </div>

        <div class="form-group">
            <label for="password">Lastname:</label>
            <span class="input-group-text"><i class="fa fa-pencil"></i></span>
            <input type="text" class="form-control" name="lastname" required pattern="^[A-Za-z]+">
        </div>
       
        <div class="form-group">
            <label for="confirm">Favorite Pet:</label>
            <span class="input-group-text"><i class="fa fa-pencil"></i></span>
            <input type="text" class="form-control" name="fav_pet" required pattern="^[A-Za-z]+">
        </div>

        <div class="form-group">
            <label for="fname">Favorite Color:</label>
            <span class="input-group-text"><i class="fa fa-pencil"></i></span>
            <input type="text" class="form-control" name="fav_color" required pattern="^[A-Za-z]+">
        </div>

        <div class="form-group">
            <label for="mname">Childhood Bestfriend:</label>
            <span class="input-group-text"><i class="fa fa-pencil"></i></span>
            <input type="text" class="form-control" name="childhood" required pattern="^[A-Za-z]+">
        </div>

        <div class="form-group">
            <label for="lname">Username:</label>
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
            <input type="text" class="form-control" name="username" required pattern="^[A-Za-z0-9]+">
        </div>
		
		 <div class="form-group">
            <label for="lname">Password:</label>
            <span class="input-group-text"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" name="password" required pattern="^[A-Za-z0-9]+">
        </div>
     
        <div align="center">
        <button style="color:white;" name="submit"><b>Update</b></button>
        </div>

    </form>
    </div>



</div>
</div>
</div>