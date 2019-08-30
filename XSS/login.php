<?php 
	if(isset($_POST['login'])){
		
		include('connect.php');

		$user = $_POST['username'];
		$pass = $_POST['password'];

		$query = mysqli_query($conn, "SELECT * FROM user where username = '$user'
																	and password = '$pass'");

		if(mysqli_num_rows($query) == 0){
			$_SESSION['message'] = "Login Failed. User not Found!";
			header('location:index.php');
		} else {
			$row = mysqli_fetch_array($query);

			if(isset($_POST['remember'])){
				// set up cookie
				setcookie('user', $row['username'], time() + (84600*30));
				setcookie('pass'. $row['password'], time() + (86400*30));
			}
			session_start();
			$_SESSION['username'] = $row['username'];
			echo "<head> <meta http-equiv=\"Refresh\" content=\"0;url=home.php\" > </head>";

		}
	} else {
		header('location:index.php');
		$_SESSION['message'] = 'Please Login!';
	}
 ?>