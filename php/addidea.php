<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
include_once "../php/partials/db_connect.php";
session_start();


$user=$_SESSION["user"];

$cordQuery = "SELECT department.Cordinator
FROM `department`
INNER JOIN staff ON department.DepartmentID=staff.DepartmentID
WHERE StaffID = '".$user."'  ";
$coResult = $connect->query($cordQuery);		
$row = mysqli_fetch_assoc($coResult);
$cordinator = $row['Cordinator'];


$corQuery = "SELECT Email
FROM `staff`
WHERE StaffID = '".$cordinator."'  ";
$cResult = $connect->query($corQuery);		
$row2 = mysqli_fetch_assoc($cResult);
$staffemail = $row2['Email'];






$mailDesign =
  // coding for style and design for the email content
 "<!DOCTYPE html>
 <html>
 <head> 
 
 <body>
	Hey, a new idea was just added by a member of your department.
</body>
</html>
";

if(isset($_GET['id']))
{
    $id = $_GET['id'];
}

if(isset($_POST['idea-submit'])){


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
		$textareaValue = trim($_POST['idea']);
		$staff = $_SESSION["user"];
		$category = $_POST['category'];
		$anon = $_POST['anon'];

		if(isset($_FILES['featured_image'])){
			$errors= array();
			$file_name = $_FILES['featured_image']['name'];
			$file_size =$_FILES['featured_image']['size'];
			$file_tmp =$_FILES['featured_image']['tmp_name'];
			$file_type=$_FILES['featured_image']['type'];
			// $file_ext=strtolower(end(explode('.',$_FILES['featured_image']['name'])));

			$file_ext2=explode('.',$_FILES['featured_image']['name']);
			$file_ext=end($file_ext2);

	
			$extensions= array("jpeg","jpg","png", "doc","pdf","docx");
			
		
			
			if($file_size > 20973152){
				$errors[]='File size must be excately 2 MB';
			}
			
			if(empty($errors)==true){
				move_uploaded_file($file_tmp,"../uploads/".$file_name);

				$sql = "insert into ideas (Categories_CategoryID, Staff_StaffID,idea,anonymous,file_name)
				values ($category,$staff,'$textareaValue',$anon,'$file_name')"; 
				$query = mysqli_query($connect,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($connect), E_USER_ERROR);
				header("Location: ../pages/dashboard.php?success");

			}else{
				print_r($errors);
			}

		}else{$sql = "insert into ideas (Categories_CategoryID, Staff_StaffID,idea,anonymous)
			values ($category,$staff,'$textareaValue',$anon)"; 
			$query = mysqli_query($connect,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($connect), E_USER_ERROR);
			header("Location: ../pages/dashboard.php?success");}	


	}	else{
		$textareaValue = trim($_POST['idea']);
		$staff = $_SESSION["user"];
		$category = $_POST['category'];

		if(isset($_FILES['featured_image'])){
			$errors= array();
			$file_name = $_FILES['featured_image']['name'];
			$file_size =$_FILES['featured_image']['size'];
			$file_tmp =$_FILES['featured_image']['tmp_name'];
			$file_type=$_FILES['featured_image']['type'];
			// $file_ext=strtolower(end(explode('.',$_FILES['featured_image']['name'])));

			$file_ext2=explode('.',$_FILES['featured_image']['name']);
			$file_ext=end($file_ext2);

	
			$extensions= array("jpeg","jpg","png", "doc","pdf","docx");

			if($file_size > 20973152){
				$errors[]='File size must be excately 2 MB';
			}
			
			if(empty($errors)==true){
				move_uploaded_file($file_tmp,"../uploads/".$file_name);

				$sql = "insert into ideas (Categories_CategoryID, Staff_StaffID,idea,file_name)
				values ($category,$staff,'$textareaValue','$file_name')"; 
				$query = mysqli_query($connect,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($connect), E_USER_ERROR);
				header("Location: ../pages/dashboard.php?success");

			}else{
				print_r($errors);
			}
			
		}else{

		$sql = "insert into ideas (Categories_CategoryID, Staff_StaffID,idea,anonymous)
		values ($category,$staff,'$textareaValue',0)"; 
		$query = mysqli_query($connect,$sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($connect), E_USER_ERROR);
		header("Location: ../pages/dashboard.php?success");
		}
	}
	} else {header("Location: ../pages/dashboard.php?fail"); }

?>
