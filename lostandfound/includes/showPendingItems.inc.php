
<?php
$query = "SELECT item_type.id, item_type.name, item_type.create_user, item_type.create_time
FROM item_type 
WHERE item_type.status = 0";
$prepare = mysqli_query($dbconn, $query);
$num_results = mysqli_num_rows($prepare); 
printColumnHeaderPending($prepare, $dbconn, $num_results);
printColumnsPending($prepare, $num_results);	

if(isset($_POST['ajax'])){
require_once('../config.php');
global $dbconn;
$count = count($_POST['type_id']);
$array = $_POST['type_id'];
var_dump($_POST);
$i=0;
		//echo $count;
	if(isset($_POST['approve'])){			
		while($i <= $count){
			$query = "UPDATE item_type SET status = ? WHERE id = ?";
			$stmt = mysqli_prepare($dbconn, $query);
			$status = 1;
			if (isset($array[$i])){
				$id = $array[$i];		
				mysqli_stmt_bind_param($stmt, "ss",$status, $id);
				$result = mysqli_stmt_execute($stmt);
				$i = $i + 1;
			}
			else
			$i = $i + 1;
		}
		mysqli_stmt_close($stmt);	
	}
	elseif(isset($_POST['decline'])){
		while($i <= $count){
			$query = "UPDATE item_type SET status = ? WHERE id = ?";
			$stmt = mysqli_prepare($dbconn, $query);
			$status = -1;
			if (isset($array[$i])){
				$id = $array[$i];		
				mysqli_stmt_bind_param($stmt, "ss",$status, $id);
				$result = mysqli_stmt_execute($stmt);
				$i = $i + 1;
			}
			else
			$i = $i + 1;
		}
		mysqli_stmt_close($stmt);		
	}
}	
function printColumnsPending($result, $num_results)
{
	if($num_results == 0){
		echo "<tr><td colspan=\"4\">There were no records found.</td></tr>";
		return false;
	}
	while($array = mysqli_fetch_assoc($result)) 
	{
	echo "<tr class=\"check_checkbox\"/>\n";
	echo "<td>
		<input name=\"type_id[]\" id=\"type_id\" type=\"checkbox\" value=\"$array[id]\">
	</td>";
		foreach($array as $key=>$attribute)
		{
			if(empty($attribute))
				echo "<td>N/A</td>\n";
			else{
				if($key == 'create_time'){
					echo "<td>".date('M n, Y g:i a', strtotime($attribute))."</td>\n";
				}
				elseif($key != 'id'){
					echo "<td >$attribute</td>\n";
				}
			}
		}


		echo "</tr>\n";
	}
	?>
	</table> 
	</div>
	<input type="button" name="decline" value="Decline" class="buttons" onclick="declineItem('type_id');" style="float:right;" />
	<input type="button" name="approve" value="Approve" class="buttons" onclick="approveItem('type_id');" style="float:right;" />
	</form>

	<?php 
}

function printColumnHeaderPending($result, $dbconn, $num_results)
{
	?>
	<form name="pending_form" class="pad" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<input type="hidden" name="content" value="addItem" />
	<div class="table">
	<table class="table table-hover">
	<tr>
<?php
	echo "<td class=\"white custom\"></td>\n";
	for($i = 0; $i < mysqli_field_count($dbconn); $i++)
	{
		$field_info = mysqli_fetch_field($result);
        if($field_info->db == 'unions_lost_and_found'){
		    $field_info = ucwords(str_replace('_', ' ', $field_info->name));
			if($field_info != 'Id'){
				echo "<td class=\"white custom\">$field_info</td>\n";
			}
        }
	}

	echo "</tr>\n";
}
?>