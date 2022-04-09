<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php include_once "../php/partials/side-menu.php" ?>

<div class="body">
    <div class="container">
    <div class="wrapper">

<h1 class="page-header">Add Staff Member</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>FirstName:</label>
            	<input type="text" value="" name="name" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>LastName:</label>
            	<input type="text" value="" name="Designation" class="form-control" required>
        </div>
   	</div>
 	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Email:</label>
            	<input type="email" value=""  name="email" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password:</label>
            	<input type="password" value=""  name="pass" class="form-control" required>
        </div>
    </div>
	
	
    <div class="control-group form-group">
    	<div class="controls">
        	<label>Username:</label>
  <input type="text"  name="prg" value="" class="form-control" required>
        </div>
    </div>

	<div class="control-group form-group">
    	<div class="controls">
        	<label>Role:</label>
  <select name="sem" class="form-control" required>
					
					<option>Administrator</option>
					<option>Quality Assurance Manager</option>
					<option>Regular Staff</option>				
					</select>
        </div>
    </div>
                  
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Phone:</label>
            	<input type="number" id="mob" value="" class="form-control" maxlength="10" name="mob"  required>
        </div>
  	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Add New Faculty">
        </div>
  	</div>
	</form>


</div>
</div>
    </div>
</div>

</body>

</html>