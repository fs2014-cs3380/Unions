<?php
session_start('MU SAS Lost & Found');
require_once('config.php');
require_once('includes/utils.php');

$content = (isset($_POST['content'])) ? $_POST['content'] : "viewItems";

switch($content){
	Default:
		$title = "Lost Items";
		break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="mystyle.css" />
	
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/<?php echo $content; ?>.js"></script>
	<script src="js/global.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
</head>
<body>


<div id="header" class="pad">
	<div class="top">
		<span class="topBanner"></span>
		<h1 class="pageTitle"><?php echo $title; ?></h1>
	</div>

	<nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="#" onclick="formSubmit('nav_form', 'viewItems');">Lost and Found</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php if(checkIfLoggedIn()){ ?>
			<ul class="nav navbar-nav">
				<li><a href="#" class="navBlack" onclick="formSubmit('nav_form', 'addItem');">Add item</a></li>
				<!--<input type="button" name="add" class="buttons" value="Add" onclick="showClaimedItems('claimed Items');">-->
				<li><a href="#ClaimedItemModal" class="navBlack" onclick="showClaimedItems('claimed_items');">Show claimed items</a></li>
				<li><a href="#" class="navBlack" onclick="formSubmit('nav_form', 'showPendingItems');">Show pending items</a></li>
			</ul>
			<?php } ?>
			<form action="#" method="post" name="nav_form">
			<input type="hidden" name="content" />
			<ul class="nav navbar-nav navbar-right">
					<?php
					if(!checkIfLoggedIn()){
						echo '<li><a href="#" class="navBlack" onclick="formSubmit(\'nav_form\', \'login\');">Login</a></li>';
					}else{
						echo '<li><a href="#" class="navBlack" onclick="logoutRedirect();">Logout</a></li>';
					}
				?>	
				</form>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
</div>

<?php 
require_once('includes/claimedItemModal.php');
include_once("includes/".$content.".inc.php"); 

?>
</body>
</html>