<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
</head>
<body>
	<h2 style="padding:10px; margin: 10px; font-size: 45px;"><?php echo $_SESSION['user_name'];?></h2>
	<a style="padding:10px; margin: 10px;" href="admin_createuser.php">Create User</a>
	<a style="padding:10px; margin: 10px;" href="admin_edituser.php">Edit User</a>
	<a style="padding:10px; margin: 10px;" href="admin_deleteuser.php">Delete User</a>
	<a style="padding:10px; margin: 10px;" href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>
