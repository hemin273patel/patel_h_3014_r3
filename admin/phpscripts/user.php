<?php
// Crete the user for the entry in the database
	function createUser($fname, $username, $password, $email, $lvllist) {
		include('connect.php');
// Create user query for SQL
		$userstring = "INSERT INTO tbl_user VALUES(NULL,'{$fname}','{$username}','{$password}', '{$email}', NULL,'{$lvllist}', 'no', NULL)";
// echo $userstring;
		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			redirect_to('admin_index.php');
		}else{
			$message = "You had a problem with the database or sql.";
			return $message;
		}
		mysqli_close($link);
	}

// Create the function for edit user
	function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');
// Update user with edit query
		$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Something went wrong; you are not allowed to change the information.";
			return $message;
		}
    mysqli_close($link);
	}

// Create the function for the deletetion of the user
	function deleteUser($id) {
		include('connect.php');
// Delete the user with the delete query
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery) {
			redirect_to("../admin_index.php");
		}else{
			$message = "Bye, You lost your info..";
			return $message;
		}
		mysqli_close($link);
	}
?>
