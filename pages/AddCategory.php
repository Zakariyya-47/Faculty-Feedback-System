<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php include_once "../php/partials/side-menu.php" ?>

<div class="body">
    <div class="container">
    <div class="wrapper">

<h1 class="page-header">Add New Category</h1>
<div class="col-lg-8" style="margin:15px;">

	<form action="..\php\insertcat.php" method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Category:</label>
            	<input type="text" value="" name="catname" class="form-control" required>
        </div>
   	</div>

       <br>
       <br>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>CategoryDescription:</label>
            	<input type="text" value="" name="catdesc" class="form-control" required>
        </div>
   	</div>

       <br>
       <br>
 	
       <div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="addCatSave" value="Add New Category">
        </div>
  	</div>
	</form>

</div>




<form action="../php/deleteCat.php" method=POST enctype="multipart/form-data">

<h1 class="page-header">Categories Not Being Used</h1>

				<table class="table">
					<thead>
						<th scope="col">Category</th>
            			<th scope="col">Delete Category</th>
					</thead>
					<tbody>
					<?php
					    $commentQuery = "SELECT CategoryName, CategoryID FROM `categories` 
						left outer JOIN ideas 
						ON categories.CategoryID = ideas.Categories_CategoryID
						WHERE ideas.Categories_CategoryID is null";
              			$commentsResult = $connect->query($commentQuery);
						while($row = mysqli_fetch_assoc($commentsResult)){

							echo"
								<tr>
									<td>$row[CategoryName]</td>
              ";
              ?><td><input type="hidden" id="weekday-1" name="catID" value="<?php echo $row['CategoryID']?>"> 
			  <input type="submit" name="deleteCat"class="button" value="Delete" /></td>
              <td>
            </tr> <?php
						}
					?>
					</tbody>			
				</table>

</form>

















</div>
    </div>
</div>

</body>

</html>