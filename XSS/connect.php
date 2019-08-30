<?php 
	include('config.php');

	$conn = mysqli_connect($hostname, $username, $password, $db_name);

	// check connection
	if(mysqli_connect_error()){
		echo 'Failed to connect to MySQL: '.mysqli_connect_error();
	}
 ?>