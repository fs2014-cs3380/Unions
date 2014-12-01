<?php
$authOnlyColumns = array('id', 'description_of_the_item');


if(!empty($_SESSION)){
	if(isset($_SESSION['auth_token']) || $_SESSION['auth_token'] == true){
		$query = "SELECT item.id, item.location AS where_item_was_found, item.description as description_of_the_item, 
		item_status.description as where_item_is_available_for_pickup, item_type.name as type_of_item, 
		item.found_date as date_item_was_found, item_type.status as status, item.status_id as item_status
		FROM item
		INNER JOIN item_status 
		ON item.status_id = item_status.id 
		INNER JOIN item_type
		ON item.type_id = item_type.id
		WHERE item_status.id != 2
		ORDER BY where_item_is_available_for_pickup
		";
	}
} elseif(!isset($_SESSION['auth_token']) || $_SESSION['auth_token'] != true){
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
?>
<form name="view" class="" action="index.php" method="post">
	<p class="black">
		<?php 
		if(isset($_SESSION['insert-success'])){
			?><div class="alert alert-success"><?php echo  $_SESSION['insert-success'];?></div>
		<?php	
		}elseif(isset($_SESSION['insert-fail'])){
			?><div class="alert alert-danger"><?php echo $_SESSION['insert-fail'];?></div>
		<?php	
		}
		if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true) {?>
			<input type="hidden" name="content" value="addItem" />
		<?php } ?>
	</p>
</form>

<?php
$stmt = mysqli_query($dbconn, $query);
printColumnHeader($stmt, $dbconn);
printColumns($stmt);

// Destroy the session variable
unset($_SESSION['insert-success']);

function printColumns($result)
{	
	global $authOnlyColumns;
	if($result->num_rows == 0){
        echo "<tr><td colspan=\"8\">There were no records found.</td></tr>";
		return false;
	}
	while($array = mysqli_fetch_assoc($result)) 
	{	
		echo "<tr>\n";
		foreach($array as $key=>$attribute)
		{
			if(in_array($key, $authOnlyColumns) && (!isset($_SESSION['auth_token']) || $_SESSION['auth_token'] != true)){
				continue;
			} else {
				if($key == 'status' ){
					if($attribute == 0)
						echo "<td>Pending</td>\n";
					elseif($attribute == 1)
						echo "<td>Approved</td>\n";
					elseif($attribute == -1)
						echo "<td>Declined</td>\n";
				}elseif($key =='date_item_was_found'){
					echo "<td>".date('M n, Y', strtotime($attribute))."</td>\n";
				}
				elseif(empty($attribute)) {
					echo "<td>N/A</td>";
				} elseif($key != 'item_status') {
					echo "<td >$attribute</td>\n";
				}
			}
		}
		if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true){

			?><td><a data-toggle="modal" data-target="#editItemModal" data-id="<?php echo $array['id']; ?>" data-description="<?php echo $array['description_of_the_item']; ?>" data-status="<?php echo $array['item_status']; ?>" class="open-editItemModal" href="#editItemModal"><span class="glyphicon glyphicon-edit"></span></a></td>
			<?php
		}
		echo "</tr>\n";
	}
	echo "</table>";
	echo "</div>\n";
	echo "</form>\n";
}

function printColumnHeader($result, $dbconn)
{
	global $authOnlyColumns;

	echo '<form method="POST" id ="action_form" name="action_form" class="pad" action="index.php" onsubmit="return false">
	<input type="hidden" name="content" value="edit" />;
	<input type="hidden" name="pk" />
	<input type="hidden" name="action" />
	<input type="hidden" name="status" />';
	echo "<div class=\"table\" >\n";
	echo "<table class=\"table table-hover\">\n";
	echo "<tr>\n";
	for($i = 0; $i < mysqli_field_count($dbconn); $i++)
	{
		$field_info = mysqli_fetch_field($result);
        if($field_info->db == 'unions_lost_and_found'){
		    $field_name = ucwords(str_replace('_', ' ', $field_info->name));
			if(in_array($field_info->name, $authOnlyColumns) && (!isset($_SESSION['auth_token']) || $_SESSION['auth_token'] != true)){
				continue;
			} else {
				if($field_name != "Item Status"){
					echo "<td class=\" custom\">$field_name</td>\n";
				}
			}	
        }
	}
	if(isset($_SESSION['auth_token']) && $_SESSION['auth_token'] == true){
		echo "<td class=\"custom\">Edit</td>\n";
	}
	echo "</tr>\n";
}
require_once("editItemModal.php");
?>


