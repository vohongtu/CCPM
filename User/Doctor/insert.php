<?php
	require "connect.php";

	$username = (!empty($_POST['Username'])) ? $_POST['Username'] : '';
	$password = (!empty($_POST['Password'])) ? $_POST['Password'] : ''; 
	$message = "null";
	// if (strlen($username) > 0 && strlen($password) > 0 ){
	if (($username)&&($password)){
		$query = "INSERT INTO users (Username, Password) 
		VALUES ('$username','$password')";
		$data = mysqli_query($con,$query);
		if ($data) {
			$message = "success";   
		}else{
			$message = "fail";
		}
	}
	echo json_encode(["message" => $message]);

?>		