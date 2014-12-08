
<?php

session_start();
		require_once('../database.php');
		$dbconn = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
		$query = "SELECT  item.location AS where_item_was_found, item.description as description_of_the_item, item_status.description as where_item_is_available_for_pickup, item_type.name as type_of_item, item.found_user as who_found_it, item.found_date as date_item_was_found
		FROM item 
		INNER JOIN item_status 
		ON item.status_id = item_status.id 
		INNER JOIN item_type
		ON item.type_id = item_type.id
		WHERE item_status.id != 2
		";
		//$query = "SELECT * FROM item";
		$prepare = mysqli_query($dbconn, $query);
		require_once('studentView.inc.php');
		printColumnHeader($prepare, $dbconn);
		printColumns($prepare);
		
?> 
