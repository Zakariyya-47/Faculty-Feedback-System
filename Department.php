<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<form action="Department.php" method="post">
            <div class="container">
            <div class="row">

            <div class="col-sm-3">

            <label for="Department"><b>Department</b></label>
            <input class="form-control" id="Department"  type="text" name="Department" required>

            <label for="department_code"><b>Department_Code</b></label>
            <input class="form-control" id="departmentcode"  type="text" name="departmentcode" required>


            <hr class="mb-3">
            <input class="btn btn-primary" type="submit" id="Add" name="create" value="Add">
                
            </div>
            </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#Add').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


			var Department 	= $('#Department').val();
			var departmentcode	= $('#departmentcode').val();
			
			
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'Dept_Process.php',
					data: {Department: Department,departmentcode: departmentcode},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});

				
			}else{
				
			}

			



		});		

		
	});
	
</script>
    
</body>
</html>