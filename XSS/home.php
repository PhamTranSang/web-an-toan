<?php 
	session_start();

	if(!isset($_SESSION['username']) || trim($_SESSION['username']) == ''){
		header('index.php');
		exit();
	} 
	include('connect.php');
	/*
	$query = mysqli_query($conn, "SELECT * FROM user 
																WHERE userid = '".$_SESSION['id']."'");
	$row = mysqli_fetch_assoc($query);
 ?>
	*/

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 	$query = "UPDATE user set username = '".$_POST['disp_name']."' 
 						WHERE username = '".$_SESSION['username']."'";
 	mysqli_query($conn, $query);
 	echo 'Update Success <br>';
 	echo '<a href="logout.php">Logout</a>';
 } else {
 	if(strcmp($_SESSION['username'], 'admin') == 0){
 		echo 'Welcome admin <br>';
 		echo 'List of user\'s are <br>';

 		$query = "SELECT username from user where username != 'admin'";
 		$result = mysqli_query($conn, $query);
 		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 		echo "$row[username]";
 		echo '<br>';
 		echo '<a href="logout.php">Logout</a>';
 	}
 	else {
 		echo "<form method=\"post\" action=\"home.php\">";
  	echo "Update display name:<input type=\"text\" name=\"disp_name\">";
  	echo "<input type=\"submit\" value=\"Update\">";
 }
 } 
 /*
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Setting cookie on user login</title>
 </head>
 <body>
 	<h2>Login Success</h2>
 	<?php echo $row['fullname']; ?> <br>
 	<a href="logout.php">Logout</a>
 </body>
 </html>
*/