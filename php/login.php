<?php 
session_start();
$errorMessage = '';
if(!empty($_POST["login"]) && $_POST["email"]!=''&& $_POST["loginPass"]!='') {	
	$email = $_POST['email'];
	$password = $_POST['loginPass'];
	// $password = md5($password);

	$sqlQuery = "
		SELECT Staff_StaffID 
		FROM roles 
		WHERE Password='".$password."'";
	$resultSet = $connect->query($sqlQuery);		
	
	if($resultSet->num_rows){
		$userDetails = $resultSet->fetch_assoc();
		$_SESSION["user"] = $userDetails['Staff_StaffID'];
		header("Location:../pages/dashboard.php");
	} else {	
	    $errorMessage = "Invalid login!";	
	}
    } else if(!empty($_POST["email"])){
	$errorMessage = "Enter Both user and password!";
    }	