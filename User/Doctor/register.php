<?php
	require "connect.php";
	mysqli_set_charset($con,'utf8');
	/** Array for JSON response*/
	$response = array();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$phone = $_POST['Phone'];
		$query = "SELECT Username FROM users WHERE Username = '$username'";
		$result = @mysqli_query($con,$query);
		if (mysqli_num_rows($result) != 0) {	
				$response["success"] = 0;
				$response["message"] = "Tên đăng nhập đã có người sử dụng!";
			} else {	
				$sqlInsert = "INSERT INTO users (Username,Password,Phone) VALUES ('$username','$password','$phone')";
				$resultInsert = @mysqli_query($con,$sqlInsert);
				if ($resultInsert) {
						$sqlGetInfo = "SELECT * FROM users WHERE FIND_IN_SET('$username',Username) AND FIND_IN_SET('$password',Password)";
						$result = mysqli_query($con,$sqlGetInfo);
						$row = mysqli_fetch_array($result);
						
						$response["success"] = 1;
						$response["message"] = "Đăng ký thành công!";
						$response["Username"] = $user_name;
						
				} else {
					$response["success"] = 0;
					$response["message"] = "Đăng ký thất bại!";
				}
			}	
			/**Return json*/
		echo json_encode($response);
	}
?>