<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$Department   = $_POST['Department'];
	$departmentcode   = $_POST['departmentcode'];
	
	

		$sql = "INSERT INTO department (DepartmentID,DepName) VALUES(?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$departmentcode,$Department]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}