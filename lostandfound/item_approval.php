<?php
session_start();
require_once('includes/item_approval.inc.php');
	$query = "SELECT item_type.id, item_type.name, item_type.create_user
	FROM item_type 
	WHERE item_type.status = 0";
	$prepare = mysqli_query($dbconn, $query);
	$pending_items = mysqli_num_rows($prepare);
	if($pending_items == 0){
		header("Location: view.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<script>
	function updateItemStatus(form, pk, action){
		document.forms[form].elements['pk'].value = pk;
		document.forms[form].elements['action'].value = action;
		document.forms[form].submit();
	}
	</script>
	<head>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>

	<style>
	.pageTitle{
		color: #ffcc33;
		font-family: 'Roboto', sans-serif;
        font-size: 60px;
		float: left;
		padding-top: 20px;
		padding-left: 160px;
		font-weight: normal !important;
	}
	.ui-widget-content {
	font-family: 'Roboto', sans-serif;
		border: 1px solid #aaaaaa;
		background: black url(images/ui-bg_flat_75_ffffff_40x100.png) 50% 50% repeat-x !important;
		color: #ffcc33;
	}
	</style>
<body>
	<div class="top" >
		<span class="topBanner"></span>
		<h1 class="pageTitle">Approval Page</h1>
		<p class="logout"><a href="view.php">View</a></p>
	</div><br>
	<?php	
		printColumnHeader($prepare, $dbconn);
		printColumns($prepare);
	?>
		

</body>
</html>




