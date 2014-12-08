
<?php
session_start();
require_once('database.php');
$dbconn = mysqli_connect(HOST,USERNAME,PASSWORD,DBNAME);
if(!empty($_SESSION)){
if(isset($_SESSION['auth_token']) || $_SESSION['auth_token'] == true){
	$query = "SELECT item.id, item.location AS where_item_was_found, item.description as description_of_the_item, 
	item_status.description as where_item_is_available_for_pickup, item_type.name as type_of_item, 
	item.found_date as date_item_was_found, item_type.status as status
	FROM item 
	INNER JOIN item_status 
	ON item.status_id = item_status.id 
	INNER JOIN item_type
	ON item.type_id = item_type.id
	WHERE item_status.id != 2
	ORDER BY where_item_is_available_for_pickup
	";
}
}
elseif(!isset($_SESSION['auth_token']) || $_SESSION['auth_token'] != true)
{
	$query = "SELECT item.id, item.location AS where_item_was_found, 
	item.description as description_of_the_item, item_status.description as where_item_is_available_for_pickup, 
	item_type.name as type_of_item, item.found_date as date_item_was_found
	FROM item 
	INNER JOIN item_status 
	ON item.status_id = item_status.id 
	INNER JOIN item_type
	ON item.type_id = item_type.id
	WHERE item_status.id != 2 AND item_type.status = 1
	ORDER BY where_item_is_available_for_pickup
	";
}

$prepare = mysqli_query($dbconn, $query);
require_once('includes/view.inc.php');
printColumnHeader($prepare, $dbconn);
printColumns($prepare);


// Destroy the session variable
unset($_SESSION['insert-success']);
?> 
