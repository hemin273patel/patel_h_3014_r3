<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);
	//echo $info;

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
</head>
<body>
	<h2>Edit User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
		<label style="font-size:20px; padding:10px; margin: 10px;">First Name:</label>
		<input style="margin-left:5px;" type="text" name="fname" value="<?php echo $info['user_fname'];  ?>"><br><br>
		<label style="font-size:20px; padding:10px; margin: 10px;">Username:</label>
		<input style="margin-left:5px;" type="text" name="username" value="<?php echo $info['user_name'];  ?>"><br><br>
		<label style="font-size:20px; padding:10px; margin: 10px;">Password:</label>
		<input style="margin-left:5px;" type="text" name="password" value="<?php echo $info['user_pass'];  ?>"><br><br>
		<label style="font-size:20px; padding:10px; margin: 10px;">Email:</label>
		<input style="font-size:20px; padding:10px; margin: 10px;" type="text" name="email" value="<?php echo $info['user_email'];  ?>"><br><br>
		<input style="font-size:20px; padding:10px; margin: 12px;" type="submit" name="submit" value="Edit Account">
	</form>
</body>
</html>
