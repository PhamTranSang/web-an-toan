<?php 
	session_start();
	include('connect.php');
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>LOGIN FORM</title>
 </head>
 <body>
 	<h2>Login Form</h2>
 	<form method="POST" action="login.php">
 		<label>Username:</label><input type="text" name="username" 
 		value="<?php if (isset($_COOKIE['user'])) {echo $_COOKIE['user'];}?>"> <br>
 		<label>Password:</label><input type="password" name="password"
 		value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];}?>"> <br>
 		<input type="checkbox" name="remember"> Remember me <br>
 		<input type="submit" name="login" value="login">
 		<!---
 		<span>
 			<?php 
 			//	if(isset($_SESSION['message'])){
 			//		echo $_SESSION['message'];
 			//	}
 			//	unset($_SESSION['message']);
 			 ?>
 		</span>
 		-->
 	</form>
 </body>
 </html>