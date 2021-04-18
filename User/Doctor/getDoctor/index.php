<?php
	require "../connect.php";

	mysqli_set_charset($con,'utf8');
	$query = "SELECT * FROM calendar ";
	$result= mysqli_query($con, $query);
	$response = array();
		if(mysqli_num_rows(@mysqli_query($con, $query)) > 0){
	        $response["success"] = 1;
			$response["message"] = "Thành công."; 
			echo json_encode($response);		
		while ($row = mysqli_fetch_array($result)) {
			$response =[
						"id"=>  		$row["Id"],
						"id_doctor"=>	$row["id_doctor"],
						"date"=>		$row["Date"],
						"time"=>		$row["Time"],			 		
						"notes"=>		$row["Notes"]			 		
			];									
			echo json_encode($response);
	    }	
	    	if(count($response) > 0){
	    		
	   	 	}
		}else{
			$response["success"] = 0;
			$response["message"] = "that bai.";
			
		}
	
	return;
?>