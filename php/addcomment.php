<?php 
session_start();
include_once "../php/partials/db_connect.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

if(isset($_POST['comment-submit']))
{
	$textareaValue = trim($_POST['comment']);
	$staff = $_SESSION["user"];
	$date = date("Y/m/d");
	$sql = "insert into comments (Content,CommentSubmissionDate,Ideas_IdeaID,Ideas_Staff_StaffID)
	values ('$textareaValue', $date ,$id,$staff)"; 
	$query = mysqli_query($connect,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($connect), E_USER_ERROR);
	header("Location: ../pages/comments.php?id=$id");


} else {header("Location: ../pages/comments.php?fail?id=$id"); }


?>
