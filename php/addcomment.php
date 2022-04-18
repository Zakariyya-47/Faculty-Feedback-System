<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
include_once "../php/partials/db_connect.php";
session_start();

if(isset($_GET['id'])){$id = $_GET['id'];}
$user=$_SESSION["user"];

$codQuery = "SELECT staff.Email
FROM `staff`
INNER JOIN ideas ON staff.StaffID=ideas.Staff_StaffID
WHERE ideas.Staff_StaffID = '".$user."'  ";
$idResult = $connect->query($codQuery);		
$row = mysqli_fetch_assoc($idResult);
$staffemail = $row['Email'];




$mailDesign =
  // coding for style and design for the email content
 "<!DOCTYPE html>
 <html>
 
 <body>
	Hey, Someone just commented on your idea.
</body>
</html>
";

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

if(isset($_POST['comment-submit']))
{

	$mail = new PHPMailer(true);
	try {
	  $mail->SMTPDebug = 2;                                       
	  $mail->isSMTP();                                            
	  $mail->Host       = 'smtp.gmail.com';                    
	  $mail->SMTPAuth   = true;                             
	  $mail->Username   = 'zakariya.zaks47@gmail.com';                 
	  $mail->Password   = 'nhcvidqzaxitpvjq';                        
	  $mail->SMTPSecure = 'tls';                              
	  $mail->Port       = 587;  
	
	  $mail->setFrom('zakariya.zaks47@gmail.com', 'FacultyFeed');           
	  $mail->addAddress($staffemail);
  
	  $mail->isHTML(true);                                  
	  $mail->Subject = 'New Idea Added';
	  $mail->Body    =  $mailDesign;
	  $mail->send();
	  echo '<script>alert("Your contribution has been uploaded succesfully")</script>';
	  // header("Location:../pages/dashboard.php");
	  echo "Mail has been sent successfully!";
  } catch (Exception $e) {
	  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  if(isset($_POST['anon'])){
	$anon = $_POST['anon'];
	$textareaValue = trim($_POST['comment']);
	$staff = $_SESSION["user"];
	$date = date("Y/m/d");
	$sql = "insert into comments (Content,CommentSubmissionDate,Ideas_IdeaID,Ideas_Staff_StaffID,anonymous)
	values ('$textareaValue', $date ,$id,$staff,$anon)"; 
	$query = mysqli_query($connect,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($connect), E_USER_ERROR);
	header("Location: ../pages/comments.php?id=$id");
}else{
	$textareaValue = trim($_POST['comment']);
	$staff = $_SESSION["user"];
	$date = date("Y/m/d");
	$sql = "insert into comments (Content,CommentSubmissionDate,Ideas_IdeaID,Ideas_Staff_StaffID)
	values ('$textareaValue', $date ,$id,$staff)"; 
	$query = mysqli_query($connect,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($connect), E_USER_ERROR);
	header("Location: ../pages/comments.php?id=$id");
}

} else {header("Location: ../pages/comments.php?fail?id=$id"); }


?>
