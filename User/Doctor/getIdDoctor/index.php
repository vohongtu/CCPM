<?php
	require "../connect.php";
	mysqli_set_charset($con,'utf8');
	/** Array for JSON response*/
	

	$response = [];
	
	$query = "SELECT id, name FROM users WHERE FIND_IN_SET(1, level) ";

	$result= mysqli_query($con, $query);
	$data = [];

	while ($row = mysqli_fetch_assoc($result)) {
		array_push($data, $row);
	}

	http_response_code(200);
	echo json_encode([
		"message" => "success",
		"data" => $data
	]);	
?>