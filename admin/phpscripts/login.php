<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
//Only word and num
		$username = mysqli_real_escape_string($link, $username);
//Only word and num
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
		$user_set = mysqli_query($link, $loginstring);
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			//session will start
				$_SESSION['user_id'] = $id;
				$_SESSION['user_name']= $founduser['user_fname'];
				if(mysqli_query($link, $loginstring)){
					//update system database
					$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
					$updatequery = mysqli_query($link, $update);
					$firstTimer = "UPDATE `tbl_user` SET `user_time` = 1 WHERE `user_id`={$id}";
					$firstTimerquery = mysqli_query($link, $firstTimer);

          // User identification if he will new his time will 0 as per the database and he will be direcrted to the edit page older go to the index
					if($founduser['user_time'] > 0){
            // add one point even if he is old user
						$getOne = $founduser['user_time'] + 1;
						// update the database
						$firstTimer = "UPDATE `tbl_user` SET `user_time` = {$getOne} WHERE `user_id`={$id}";
            // go to index as per rule
						redirect_to("admin_index.php");
					}else{
						// New welcome and edit your stuff and get one point so you will not redirect here again
						$getOne = $founduser['user_time'] + 1;
						// got one point and update the database
						$firstTimer = "UPDATE `tbl_user` SET `user_time` = {$getOne} WHERE `user_id`={$id}";
						// go to the edit page
						redirect_to("admin_edituser.php");
}
				// redirect_to("admin_index.php");

		}else{
			$message = "Enter Right Info.";
			return $message;
		}

		mysqli_close($link);
	}
 // }
?>
