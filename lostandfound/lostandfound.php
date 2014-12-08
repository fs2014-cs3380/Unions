<?php

session_start();

require_once('database.php');
$dbconn = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
		
function generateItemTypeDropdown(){
	global $dbconn;
	$query = "SELECT * FROM item_type";
	$result = mysqli_query($dbconn, $query);
	while($r = mysqli_fetch_assoc($result)){
		echo '<span class="space"><option value="'.$r['id'].'">'.$r['name'].'</option>';
	}

}

if(isset($_POST['ajax'])){
	$query = "INSERT INTO item_type (name, create_user, create_time) 
	VALUES (?, ?, NOW())";
	$stmt = mysqli_prepare($dbconn, $query);
	$create_user = isset($_SESSION['pawprint']) ? $_SESSION['pawprint'] : null;
	mysqli_stmt_bind_param($stmt, "ss", $_POST['item_type'],$create_user);
	$result = mysqli_stmt_execute($stmt);
	if($result){
		require_once('PHPMailer-Master/PHPMailerAutoload.php');
		require_once('PHPMailer-Master/class.phpmailer.php');
		require_once('PHPMailer-Master/class.smtp.php');
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
		$mail->addAddress('bdbtzc@missouri.edu');
		//Set the subject line
		$mail->Subject = 'Test';
		if($pending_items == 1){
			$mail->Body = "$create_user is want to add $_POST[item_type] as an item type. \n
			There is currently $pending_items pending item. 
			Please follow this link to login and approve or decline this item. http://argo.col.missouri.edu/lostandfound/login.php";
		}
		else {
		$mail->Body = "$create_user is want to add $_POST[item_type] as an item type. \n
		There are currently $pending_items pending items. 
		Please follow this link to login and approve or decline these items. http://argo.col.missouri.edu/lostandfound/login.php";
		}
		//Replace the plain text body with one created manually
		$mail->AltBody = 'This is a plain-text message body';
		//send the message, check for errors
		if ($mail->send()) {
			generateItemTypeDropdown();
		} else {
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
		mysqli_close($stmt);
	} else {
		http_response_code(400);
	}
} else {

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
				header("Location: view.php");
			}
			mysqli_stmt_close($stmt);		

		}
		elseif(isset($_POST['logout'])){
			header("Location: logout.php");
		}
		elseif(isset($_POST['claimed-items'])){
			
			var_dump($_POST);
		}
	
?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	
	function addType(input_id, update_id){
		$.ajax({
			url: 'lostandfound.php',
			dataType: 'html',
			type: 'post',
			data: {action: 'add_type', item_type: $('#'+input_id).val(), ajax:true},
			success: function(data){
				$('#item_types').html(data);
				$('#add_type').modal('hide');
			},
			error: function(request, status, error){
				console.log(request);
				if(error == "Bad Request"){
					$('<div class="error">Duplicate Item Type</div>').insertBefore('#add_type #item_type');
				}
			}
		});
		
	}
	
	function addItem(form, action){
		$('#add_type').modal('show');
	}
	</script>
</head>

<body>
	<form method="POST" id ="action_form" name="action_form" action="edit.php" onsubmit="return false">
	<input type="hidden" name="action" />
	<input type="hidden" name="itemType" />
	</form>
	<div class="top">
		<span class="topBanner"></span>
		<h1 class="pageTitle">Add a New Lost Item</h1>
		<?php if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true) {?>
			<p class="logout"><a href="logout.php">Log Out</a></p>
		<?php } ?>
	</div><br>
	<div id="input" >
	<form name="register" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="hidden" name="pk" />
	<input type="hidden" name="action" value="update" />
			<div class="header">
				<h1 class="titles">Lost and Found</h1>
				<span class="info">Please fill out the following form.</span><hr>
			</div>
		
			<div class="credentials">
				Where was the item found:<span class="space"></span><input  type="text" name="location"placeholder="Location" class= "box searchFieldText" required><span class="tab"></span><br><br>
				Who found it?:<span class="space"></span><input  type="text" name="found_user" placeholder="Pawprint" class="box searchFieldText" required><br><br>
				Date found:<span class="space"></span><input type="text" id="datepicker" class="date" placeholder="Date" name="date_found" required><br><br><hr>
				Item Type:<br><br>
				<select class="box" name="item_id" id="item_types">
					<?php generateItemTypeDropdown(); ?>
				</select>

				<span class="space"><input type="button" name="add" class="buttons" value="Add" onclick="addItem('action_form', 'add');">
				<hr>
				
			</div>
		
			<div class="credentials">
				Item Description:<br><br>
				<textarea name="description" class="description searchFieldText" onMousedown="clear" required></textarea>
			</div><hr>
			<div class="footer">
				<input type="submit" name="submit" value="Post" class="buttons" /><span class="tab">
				<input type="button" name="cancel" class="buttons" value="Cancel" onclick="top.location.href='view.php';">
			</div>
	</form>
	<div class="modal fade" id="add_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title titles" id="add_type" style="color: black;">Please enter the new Item Type</h4>
				  </div>
				  <div class="modal-body">
						<form name="login" class="" action="#" method="post" onsubmit="return false;">
							<div class="credentials input">
								<input type="text" name="item_type" id="item_type" placeholder="Item Type" class="box" title="Please provide your username" />
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
							<input class="btn btn-default" type="button" name="submit" value="Add" onclick="addType('item_type', 'item_id');">
						  </div>
						</form>
				</div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
	</div>

</body>
</head>
</html>
<?php
	
	}
	elseif(!isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == false){
		header("Location: login.php");
	}
}
?>