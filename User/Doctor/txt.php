<?php
	require "connect.php";

	$username ="John";
	$password = "Doe";z
	}

	// $username = (!empty($_POST['Username'])) ? $_POST['Username'] : '';
	// $password = (!empty($_POST['Password'])) ? $_POST['Password'] : ''; 
	if (strlen($username) > 0 && strlen($password) > 0 ){
		$manguser = array();
		$query = "SELECT * FROM users WHERE FIND_IN_SET('$username',Username) AND FIND_IN_SET('$password',Password)";
		$data = mysqli_query($con,$query);
		if ($data) {
			if (count($manguser) > 0) {
				echo json_encode($manguser);
				# code...
			}else{
				echo "fail";
			}
		}else{
			echo "fail";
		}
	}else{
		echo "Null";
	}

?>		
