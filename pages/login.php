<?php 
include_once "../php/partials/db_connect.php";
include_once "../php/login.php";
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page in HTML with CSS Code Example</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/login.css">

</head>
<body>

<div class="box-form">
	<div class="left">
		<div class="overlay">
		<h1>Hello World.</h1>
		<p>Wlcome to our Feedback System</p>
		</div>
	</div>
		
	<div class="right">
		<h5>Login</h5>
		<p>We would like to hear from you. it takes less than a minute</p>

		<form id="loginform" method="POST">                                    
			<div class="inputs">
				<input type="text" placeholder="user name" id="email" name="email">
				<br>
				<input type="password" placeholder="password" id="loginPass" name="loginPass">
			</div><br><br>

			<div class="remember-me--forget-password">
				<label>
					<input type="checkbox" name="item" checked/>
					<span class="text-checkbox">Remember me</span>
				</label>
				<p>forget password?</p>
			</div><br>
			
			<?php if ($errorMessage != '') { ?>
				<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
			<?php } ?>

			<input type="submit" name="login" value="Login" class="">
	
		</form>
	</div>
</div>

  
</body>
</html>


