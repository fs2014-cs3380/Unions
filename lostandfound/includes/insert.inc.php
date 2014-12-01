<?php
	if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true){
		if(isset($_POST['submit'])){
			global $dbconn;
			$description = htmlspecialchars($_POST['description']);
			$location = htmlspecialchars($_POST['location']);
			$found_user = htmlspecialchars($_POST['found_user']);
			$found_date = htmlspecialchars($_POST['date_found']);
			$found_date = date('Y-m-d H:i:s', strtotime($found_date));
			$create_user = isset($_SESSION['pawprint']) ? $_SESSION['pawprint'] : null;

			$type_id = htmlspecialchars($_POST['item_id']);
			$status_id = '1';

			$query = "INSERT INTO item (description,location, found_user, found_date, create_user, create_time, status_id, type_id) 
			VALUES (?, ?,?, ?, ?, NOW(), ?, ?)";
			$stmt = mysqli_prepare($dbconn, $query);
			mysqli_stmt_bind_param($stmt, "sssssss", $description,$location, $found_user, $found_date, $create_user, $status_id, $type_id);
			$result = mysqli_stmt_execute($stmt);
			echo mysqli_error($dbconn);
			if($result){
				$_SESSION['insert-success'] = "Record successfully created";
				$_POST['content'] = "viewItems";
			}
			mysqli_stmt_close($stmt);		

		}
	}
?>