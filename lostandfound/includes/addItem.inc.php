<?php
if(isset($_POST['ajax'])){
	session_start();
	require_once('../config.php');
	if(isset($_POST['submit_record'])){
		global $dbconn;
		
		$description = htmlspecialchars($_POST['description']);
		$location = htmlspecialchars($_POST['location']);
		$found_user = htmlspecialchars($_POST['found_user']);
		$temp_found_date = htmlspecialchars($_POST['date_found']);
		$found_date = date('Y-m-d H:i:s', strtotime($temp_found_date));
		$create_user = isset($_SESSION['pawprint']) ? $_SESSION['pawprint'] : null;

		$type_id = htmlspecialchars($_POST['type_id']);
		$status_id = '1';

		$query = "INSERT INTO item (description,location, found_user, found_date, create_user, create_time, status_id, type_id) 
		VALUES (?, ?,?, ?, ?, NOW(), ?, ?)";
		$stmt = mysqli_prepare($dbconn, $query);
		mysqli_stmt_bind_param($stmt, "sssssss", $description,$location, $found_user, $found_date, $create_user, $status_id, $type_id);
		$result = mysqli_stmt_execute($stmt);
		echo mysqli_error($dbconn);
		if($result){
			$_SESSION['insert-success'] = "Record successfully created";
		}
		else{
			
			$_SESSION['insert-fail'] = "Record was not created - ".mysqli_error($dbconn);
		}
		mysqli_stmt_close($stmt);		
	} else{
		$query = "INSERT INTO item_type (name, create_user, create_time, status)
		VALUES (?, ?, NOW(), '0')";
		$stmt = mysqli_prepare($dbconn, $query);
		$create_user = isset($_SESSION['pawprint']) ? $_SESSION['pawprint'] : null;
		mysqli_stmt_bind_param($stmt, "ss", $_POST['item_type'],$create_user);
		$result = mysqli_stmt_execute($stmt);
		if($result){
			require_once('../PHPMailer-Master/PHPMailerAutoload.php');
			require_once('../PHPMailer-Master/class.phpmailer.php');
			require_once('../PHPMailer-Master/class.smtp.php');
			$query = "SELECT item_type.id, item_type.name, item_type.create_user
			FROM item_type 
			WHERE item_type.status = 0";
			$prepare = mysqli_query($dbconn, $query);
			$pending_items = mysqli_num_rows($prepare);
			//Create a new PHPMailer instance
			$mail = new PHPMailer();
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 2;
			//Set the hostname of the mail server
			$mail->Host = "smtpinternal.missouri.edu";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 25;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = false;
			//Set who the message is to be sent from
			$mail->setFrom('musasitstaff@missouri.edu');
			//Set who the message is to be sent to
			$mail->addAddress('musasbrusda@missouri.edu');
			//Set the subject line
			$mail->Subject = 'Test';
			$mail->IsHTML(true); 
			/*if($pending_items == 1){
				$mail->Body = "$_SESSION[first_name] $_SESSION[last_name] is wanting to add $_POST[item_type] as an item type. \n
				There is currently $pending_items pending item. 
				Please follow this link to login and approve or decline this item. http://argo.col.missouri.edu/lostandfound/login.php";
			}
			else {
			$mail->Body = "$_SESSION[first_name] $_SESSION[last_name] is wanting to add $_POST[item_type] as an item type. \n
			There are currently $pending_items pending items. 
			Please follow this link to login and approve or decline these items. http://argo.col.missouri.edu/lostandfound/login.php";
			}*/
			//Replace the plain text body with one created manually
			//$mail->AltBody = 'This is a plain-text message body';
				$mail->AddEmbeddedImage('../images/unions.jpg', 'unions_logo', 'unions.jpg');
				$mail->Body = "<html style=\"background-color: black\">
									<head>
									  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
									  <title>PHPMailer Test</title>
									</head>
									<body>
										<a href=\" http://argo.col.missouri.edu/lostandfound \"><img src='cid:unions_logo' height=\"90\" width=\"340\" alt=\"Missouri Unions\"></a>
										
										<div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;\">
										<p style=\"font-size: 14px; font: font-family: 'Roboto', sans-serif;\">	$_SESSION[first_name] $_SESSION[last_name] has added a new item. Please follow this link to login and approve or decline a newly added item. http://argo.col.missouri.edu/lostandfound</p>
									  </div>
									</body>
								</html>";

				//$mail->msgHTML(file_get_contents('../PHPMailer-Master/examples/contents.html'), dirname(__FILE__));
				$mail->AltBody = 'This is a plain-text message body';
			//send the message, check for errors
			if ($mail->send()) {
				generateItemTypeDropdown();
			} else {
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
		} else {
			
		}
	}
}else {


?>
	<form method="POST" id ="action_form" name="action_form" action="" onsubmit="return false">
	<input type="hidden" name="action" />
	<input type="hidden" name="itemType" />
	</form>
	<div id="input" >
	<form name="register" id="register" class="form" action="index.php" method="post">
	<input type="hidden" name="content" value="insert" />
	<input type="hidden" name="pk" />
	<input type="hidden" name="action" value="update" />
			<div class="header">
				<h1 class="titles">Lost and Found</h1>
				<span class="info">Please fill out the following form.</span><hr>
			</div>
		
			<div class="credentials">
				Where was the item found:<span class="space"></span><input  type="text" name="location" id="location" placeholder="Location" class= "box searchFieldText" required><span class="tab"></span><br><br>
				Who found it?:<span class="space"></span><input  type="text" name="found_user" id="found_user" placeholder="Pawprint" class="box searchFieldText" required><br><br>
				Date found:<span class="space"></span><input type="text" id="datepicker" class="date" placeholder="Date" name="date_found" required><br><br><hr>
				Item Type:<br><br>
				<select class="box" name="item_id" id="item_types">
					<?php generateItemTypeDropdown(); ?>
				</select>
				
				<span class="space"><input type="button" name="add" class="buttons" value="Add" data-toggle="modal" data-target="#add_item_type">
				<hr>
				
			</div>
		
			<div class="credentials">
				Item Description:<br><br>
				<textarea name="description" id="description" class="description searchFieldText" onMousedown="clear" required></textarea>
			</div><hr>
			<div class="footer">
				<input type="button" name="submit_record" value="Post" class="buttons" onclick="addRecord('item_types', 'location', 'found_user', 'datepicker', 'description');" /><span class="tab">
				<input type="button" name="cancel" class="buttons" value="Cancel" onclick="top.location.href='index.php';">
			</div>
	</form>
	</div>


<?php
require_once('addItemTypeModal.php');
}
function generateItemTypeDropdown(){
	global $dbconn;
	$query = "SELECT * FROM item_type";
	$result = mysqli_query($dbconn, $query);
	while($r = mysqli_fetch_assoc($result)){
		echo '<span class="space"><option value="'.$r['id'].'">'.$r['name'].'</option>';
	}

}
?>