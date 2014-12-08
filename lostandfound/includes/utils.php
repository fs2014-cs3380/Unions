<?php

function checkIfLoggedIn(){
	if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true)
		return true;
	else
		return false;
}


?>