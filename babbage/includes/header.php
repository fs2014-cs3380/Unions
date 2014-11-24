<?php 
// show errors in the browser
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

DEFINE("MAINDIR", "/unions/");
$mainDir = "/Users/pcpopper/Unions/babbage/";

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
				<nav>
					<ul class="topnav">
						<li><a href="<?php echo MAINDIR ?>">Home</a></li>
						<li>
							<a href="<?php echo MAINDIR ?>">Tutorials</a>
							<ul class="subnav">
								<li><a href="<?php echo MAINDIR ?>">Sub Nav Link</a></li>
								<li><a href="<?php echo MAINDIR ?>">Sub Nav Link</a></li>
							</ul>
						</li>
						<li>
							<a href="<?php echo MAINDIR ?>">Resources</a>
							<ul class="subnav">
								<li><a href="<?php echo MAINDIR ?>">Sub Nav Link</a></li>
								<li><a href="<?php echo MAINDIR ?>">Sub Nav Link</a></li>
							</ul>
						</li>
						<li><a href="<?php echo MAINDIR ?>policies/">Policies</a></li>
					</ul>
				</nav>
<?php
$dbconn = pg_connect(CONNSTRING);
if (!$dbconn) {
	customError('Cannot connect.');
}
?>
