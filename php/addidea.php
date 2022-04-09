<?php 
session_start();
include_once "../php/partials/db_connect.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

if(isset($_POST['idea-submit']))
{
	$textareaValue = trim($_POST['idea']);
	$staff = $_SESSION["user"];
	$category = $_POST['category'];
	//$docs = $_POST[''];


	$sql = "insert into ideas (Categories_CategoryID, Staff_StaffID,idea)
	values ($category,$staff,'$textareaValue')"; 
	$query = mysqli_query($connect,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($connect), E_USER_ERROR);
	header("Location: ../pages/dashboard.php?success");


} else {header("Location: ../pages/dashboard.php?fail"); }



?>
