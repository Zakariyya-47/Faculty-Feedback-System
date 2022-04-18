<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php include_once "../php/partials/side-menu.php" ?>

<div class="body">
    <div class="container">
    <div class="wrapper">

<h1 class="page-header">Add New Department</h1>
<div class="col-lg-8" style="margin:15px;">

	<form action="..\php\insertdept.php" method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Department Name:</label>
            	<input type="text" value="" name="departmentname" class="form-control" required>
        </div>
   	</div>

       <br>
       <br>

	   <span class="choose">Coordinator</span>
		<select name="coordinator" required >
			<?php 
				$catgQuery = "SELECT * FROM staff";
				$catgResult = $connect->query($catgQuery);		
				while($catg = mysqli_fetch_assoc($catgResult)){
			?>
			<option value="
				<?php echo $catg["StaffID"];?>">
				<?php echo $catg["FirstName"];?> <?php echo $catg["LastName"];?>
			</option>
			<?php }; ?>
		</select>


       <br>
       <br>
       <div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="addDeptSave" value="Add New Department">
        </div>
  	</div>
	</form>


</div>

</div>
    </div>
</div>

</body>

</html>