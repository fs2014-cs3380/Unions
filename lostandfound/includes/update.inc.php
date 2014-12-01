<?php	
session_start();

if(isset($_POST['edit_record'])){
require_once('../config.php');
	global $dbconn;
	echo "--------->";
	var_dump($_POST);
	echo"end---------->";
	$query = "UPDATE item SET status_id = ?, description = ?, update_user = ?, update_time = NOW() WHERE id = ?";
	$stmt = mysqli_prepare($dbconn, $query);
	$status_id = htmlspecialchars($_POST['status_id']);
	$description = htmlspecialchars($_POST['description']);
	$pawprint = htmlspecialchars($_SESSION['pawprint']);
	$id = htmlspecialchars($_POST['id']);
	mysqli_stmt_bind_param($stmt, "sssi",$status_id, $description, $pawprint, $id);
	$result = mysqli_stmt_execute($stmt);
	
	echo mysqli_error($dbconn);
	mysqli_stmt_close($stmt);
	if(!empty($_POST['first_name']) && !empty($_POST['last_name'])  && !empty($_POST['email'])){
		$query = "INSERT INTO item_claim (item_id, first_name, last_name, email, claim_date) 
		VALUES (?, ?, ?, ?, NOW())";
		$stmt = mysqli_prepare($dbconn, $query);
		$last_name = htmlspecialchars($_POST['last_name']);
		$first_name = htmlspecialchars($_POST['first_name']);
		$email = htmlspecialchars($_POST['email']);
		$id = htmlspecialchars($_POST['id']);
		mysqli_stmt_bind_param($stmt, "isss", $id,$first_name,$last_name, $email);
		$result1 = mysqli_stmt_execute($stmt);
		echo mysqli_error($dbconn);
		if($result1){
			$_SESSION['insert-success'] = "Record successfully marked as claimed";
		}
		else
		{
			$_SESSION['insert-fail'] = "Record not marked as claimed";
		}
	}
}
?>