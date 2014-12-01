<?php
	/* Database Parameters */
	DEFINE("HOST","localhost");
	DEFINE("DBNAME","unions_lost_and_found");
	DEFINE("USERNAME","lost-and-found");
	DEFINE("PASSWORD","L0st&f0und!");
	$dbconn = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
	
	/* LDAP Parameters */
	DEFINE('BASEDN','dc=edu');
	DEFINE('LDAP_HOST', 'ldap.missouri.edu');
	DEFINE('PORT', '3268');
?>