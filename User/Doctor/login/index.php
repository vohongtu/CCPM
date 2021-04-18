<?php
	require "../connect.php";
	mysqli_set_charset($con,'utf8');
	/** Array for JSON response*/
	$response = array();
	if(!empty($_POST)){
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$query = "SELECT * FROM account WHERE FIND_IN_SET('$username', Username) AND FIND_IN_SET('$password', Password)";
		if(mysqli_num_rows(@mysqli_query($con,$query)) > 0){
			    $result= mysqli_query($con,$query);
                $row = mysqli_fetch_array($result);
				$user_name = $row["Username"];
				$id = $row["Id"]; 
				$fullname = $row["Fullname"];

				
				$response["success"] = 1;
				$response["message"] = "Đăng nhập thành công";
				$response["Username"] = $user_name;
				$response["Id"] = $id;
				$response["Fullname"] = $fullname;
				
		}else{
			$response["success"] = 0;
			$response["message"] = "Đăng nhập thất bại.";
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