<?php
	session_start();
	if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true){
		$_SESSION['auth_token'] == false;
		session_destroy();
		header("Location: login.php");
	}
	elseif(!isset($_SESSION['auth_token'])){
		header("Location: login.php");
	}
?>