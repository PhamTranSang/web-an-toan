<!DOCTYPE html>
<html>
<head>
	<title>Fix with prepared</title>
</head>
<body>
	<?php 
		if(!isset($_POST['submit'])){
			$msg='';
			form();
		} else{
			$conn = new mysqli('localhost','root','','mydb') or die("Error". $conn->connect_error);
			$username = $_POST['username'];
			$password = $_POST['password'];
			$stmt = $conn->prepare("SELECT username,password FROM users WHERE username =? AND password = ?");
			$stmt-> bind_param('ss',$username,$password);
			$stmt->execute();
			$stmt->bind_result($username,$password);
			$stmt->store_result();
			if($stmt->num_rows==0){
				$msg='Username and password is not correct, please try again!';
				form();
			} else {
				$msg = 'Login Success';
				form();
			}
			$stmt->close();
			$conn->close();
		}
	?>
</body>
</html>
<?php 
	function form(){
		$msg = '';
		echo "
			<form method = 'POST' name = 'login'>
				<table>
					<tr>
						<td>Username</td>
						<td><input type='text' name='username'></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type='password' name='password'></td>
					</tr>
					<tr>
						<td colspan='2' align='center'><input type='submit' name='submit' value='Submit'></td>
					</tr>
				</table>
			</form>
		" .$GLOBALS['msg'];
	}
 ?>