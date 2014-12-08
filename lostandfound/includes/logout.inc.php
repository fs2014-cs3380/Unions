<?php
	session_start();
	if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true){
		session_destroy();
	}
?>