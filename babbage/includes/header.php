<?php 
// show errors in the browser
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

DEFINE("MAINDIR", "/unions/");
$mainDir = "/students/groups/cs3380f14grp18/public_html/";
//$mainDir = "/Users/pcpopper/Unions/babbage/";

require $mainDir . '/secure/database.php';

function customError($e) {
?>
<div class="ui-widget">
	<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Alert:</strong> <?php echo $e ?></p>
	</div>
</div>
<?php
 	die();
}
function customNotice($e) {
?>
<div class="ui-widget">
	<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
		<strong>Hey!</strong> <?php echo $e ?></p>
	</div>
</div>
<?php
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Missouri Student Unions | University of Missouri</title>
		<link rel="stylesheet" href="<?php echo MAINDIR ?>styles/jquery-ui.css">
		<link rel="stylesheet" href="<?php echo MAINDIR ?>styles/styles.css">
		<script src="<?php echo MAINDIR ?>scripts/jquery-1.11.1.min.js"></script>
		<script src="<?php echo MAINDIR ?>scripts/jquery-ui.js"></script>
		<script src="<?php echo MAINDIR ?>scripts/menu.js"></script>
	</head>
	<body>
		<div id="head">
			<div id="header">
				<div id="logo"><div id="small_logo"></div><div id="logo_cover"></div></div>
				<div id="icons">
					<a href="http://unionsart.blogspot.com/"><img src="<?php echo MAINDIR ?>images/blogger_top.png"></a>
					<a href="http://twitter.com/#!/MUStudentUnions"><img src="<?php echo MAINDIR ?>images/twitter_64.png"></a>
					<a href="http://www.facebook.com/missouristudentunions"><img src="<?php echo MAINDIR ?>images/facebook_64.png"></a>
					<a href="http://www.youtube.com/user/TheMUStudentUnions"><img src="<?php echo MAINDIR ?>images/youtube_64.png"></a>
				</div>
			</div>
		</div>
		<div id="body">
			<div id="content">
<?php
require "menu_bar.php";

$dbconn = pg_connect(CONNSTRING);
if (!$dbconn) {
	customError('Cannot connect.');
}
?>
