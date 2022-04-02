<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	

		$sql = "INSERT INTO staff (firstname, lastname, email) VALUES(?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$firstname, $lastname, $email]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}