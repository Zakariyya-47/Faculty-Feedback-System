<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php include_once "../php/partials/side-menu.php" ?>

<div class="body">
    <div class="container">
    <div class="wrapper">

<h1 class="page-header">Closure Dates</h1>
<div class="col-lg-8" style="margin:15px;">

	<form action="..\php\insertclosuredates.php" method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>First Closure Date:</label>
            	<input type="date" value="" name="closuredate" class="form-control" required>
        </div>
   	</div>

    

       <br>
       <br>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Final Closure Date:</label>
            	<input type="date" value="" name="fclosuredate" class="form-control" required>
        </div>
   	</div>

       <br>
       <br>
 	
       <div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="closuredates" value="Update Closure Dates">
        </div>
  	</div>
	</form>

</div>

</div>
    </div>
</div>

</body>

</html>
