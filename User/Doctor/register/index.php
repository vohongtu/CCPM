<?php
	require "../connect.php";
	mysqli_set_charset($con,'utf8');
	/** Array for JSON response*/
	$response = array();
	if(!empty($_POST)){
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$fullname = $_POST['Fullname'];
		$query = "SELECT Username FROM account WHERE Username = '$username'";
		
		$result = @mysqli_query($con,$query);
		if (@mysqli_num_rows($result) != 0) {	
				$response["success"] = 0;
				$response["message"] = "Tên đăng nhập đã có người sử dụng!";
			} else {	
				$sqlInsert = "INSERT INTO account (Username,Password,Fullname) VALUES ('$username','$password','$fullname')";
				$resultInsert = @mysqli_query($con,$sqlInsert);
				if ($resultInsert) {
						$sqlGetInfo = "SELECT * FROM account WHERE FIND_IN_SET('$username',Username) AND FIND_IN_SET('$password',Password)";
						$result = mysqli_query($con,$sqlGetInfo);
						$row = mysqli_fetch_array($result);
						$full_name = $row["Fullname"];
						$id = $row["Id"]; 
						
						$response["success"] = 1;
						$response["message"] = "Đăng ký thành công!";
						$response["Username"] = $username;
						$response["Fullname"] = $full_name;
						$response["Id"] = $id;
						
				} else {
					$response["success"] = 0;
					$response["message"] = "Đăng ký thất bại!";
				}
			}	
			/**Return json*/
		http_response_code(200);
		echo json_encode($response);
		return;
	}
	http_response_code(400);
	echo json_encode(['message' => 'Bad request']);
	return;
?>