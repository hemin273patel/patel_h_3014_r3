<?php
	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		//echo "Works";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login</title>
</head>
<body>
	<?php if(!empty($message)){ echo $message;} ?>
	<form action="admin_login.php" method="post">
		<label style="font-size:20px; margin: 10px;">Username:</label>
		<input style="padding:10px; margin: 10px;" type="text" name="username" value="">
		<br>
		<label style="font-size:20px; margin: 10px;">Password</label>
		<input style="padding:10px; margin: 10px;" type="password" name="password" value="">
		<br><br>
		<input style="padding:10px; margin: 10px;" type="submit" name="submit" value="Show me the money">
	</form>

</body>
</html>
