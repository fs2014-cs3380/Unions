<?php
session_start();
if(isset($_POST['action'])){
		$action = strtolower($_POST['action']);
}
else{
	header("Location: view.php");
}
	
if(isset($_SESSION['auth_token']) && $_SESSION['auth_token']){
	require_once('database.php');
	$dbconn = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
			switch($action){
				case "edit":
					$query = "SELECT item.description,location,found_date, found_user, type_id , item_status.description
					FROM item 
					INNER JOIN item_status
					ON item.status_id = item_status.id
					WHERE item.id = ?";
					$stmt = mysqli_prepare($dbconn, $query);
					mysqli_stmt_bind_param($stmt, "s", $_POST['pk']);
					$execute = mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $description,$location, $date, $found_user, $item_type, $status);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);
					require_once('includes/edit.inc.html');
					break;
				case "update":
					if(empty($_POST['first_name']) && empty($_POST['last_name'])  && empty($_POST['email']) && ($_POST['status_id'] == 2)){
						$_SESSION['insert-success'] = "Item has not been claimed, please fill out all item claimed fields";
						header("Location: view.php");
					}
					else{
						$query = "UPDATE item SET status_id = ?, description = ?, update_user = ?, update_time = NOW() WHERE id = ?";
						$stmt = mysqli_prepare($dbconn, $query);
						$status_id = htmlspecialchars($_POST['status_id']);
						$description = htmlspecialchars($_POST['description']);
						$pawprint = htmlspecialchars($_SESSION['pawprint']);
						$pk = htmlspecialchars($_POST['pk']);
						mysqli_stmt_bind_param($stmt, "sssi",$status_id, $description, $pawprint, $pk);
						$result = mysqli_stmt_execute($stmt);
						mysqli_stmt_close($stmt);
						if(!empty($_POST['first_name']) && !empty($_POST['last_name'])  && !empty($_POST['email'])){
							$query = "INSERT INTO item_claim (item_id, first_name, last_name, email) 
							VALUES (?, ?, ?, ?)";
							$stmt = mysqli_prepare($dbconn, $query);
							$last_name = htmlspecialchars($_POST['last_name']);
							$first_name = htmlspecialchars($_POST['first_name']);
							$email = htmlspecialchars($_POST['email']);
							$pk = htmlspecialchars($_POST['pk']);
							mysqli_stmt_bind_param($stmt, "isss", $pk,$first_name,$last_name, $email);
							$result1 = mysqli_stmt_execute($stmt);
							echo mysqli_error($dbconn);
							if($result1){
								$_SESSION['insert-success'] = "Record successfully marked as claimed";
				
							}
							else
							{
								$_SESSION['insert-success'] = "Record not marked as claimed";
							}
						}
						header("Location: view.php");
					}
					break;
				case "show":
					$query = "SELECT first_name, last_name, email, item.description, item_type.name as type
					FROM item_claim 
					INNER JOIN item
					ON item_claim.item_id = item.id
					INNER JOIN item_type
					ON item_type.id = item.type_id
					";
					$prepare = mysqli_query($dbconn, $query);
					require_once('includes/showClaimedItems.inc.php');
					printColumnHeader($prepare, $dbconn);
					printColumns($prepare);
					break;
				case "updateitemstatus":
					echo "test";
					break;
			}
		
	
}

?>
