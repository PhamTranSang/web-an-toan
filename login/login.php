<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body>
	<?php 
		if(!isset($_POST['submit'])){
			$msg = '';
			form();
		} else {
			$conn = mysqli_connect('localhost', 'root', '', 'mydb') or die ("Error". mysqli_error($conn));
			$username = $_POST['username'];
			$password = $_POST['password']; 
			$query = "SELECT username,password from users where username = '".$username."' and password = '".$password."'";
			$result = mysqli_query($conn, $query) or die (mysqli_error());
			$count = mysqli_num_rows($result);
			if($count == 0){
				$msg = 'Username and password is not correct, please try again!';
				form();
			} else {
				$msg = 'Login Success';
				form();
			}
			mysqli_close($conn);
			
		}
	 ?>
</body>
</html>
<?php 
	function form(){
		$msg = '';
		echo "
		<div align = 'center'>
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
		</div>
		" .$GLOBALS['msg'];
	}
 ?>