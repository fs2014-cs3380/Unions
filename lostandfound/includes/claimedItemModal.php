<?php
function printColumnsClaimedItems($result)
{
	
	if($result->num_rows == 0){
        echo "<tr><td colspan=\"6\">There were no records found.</td></tr>";
		return false;
	}
	while($array = mysqli_fetch_assoc($result)) 
	{
		echo "<tr>\n";
		foreach($array as $key=>$attribute)
		{
			if(empty($attribute))
				echo "<td>N/A</td>\n";
			elseif($key == 'date_claimed'){
				echo "<td>".date('M n, Y', strtotime($attribute))."</td>\n";
			}
			else
				echo "<td >$attribute</td>\n";
		}
		echo "</tr>\n";
	}
}

function printColumnHeaderClaimedItems($result, $dbconn)
{
	echo "<tr>\n";
	for($i = 0; $i < mysqli_field_count($dbconn); $i++)
	{
		$field_info = mysqli_fetch_field($result);
        if($field_info->db == 'unions_lost_and_found'){
		    $field_info = ucwords(str_replace('_', ' ', $field_info->name));
		   echo "<td class=\"custom\">$field_info</td>\n";
        }
	}
	echo "</tr>\n";
}

?>

<?php
	global $dbconn;
$query = "SELECT first_name, last_name, email, item.description, item_type.name as type, claim_date as date_claimed
	FROM item_claim 
	INNER JOIN item
	ON item_claim.item_id = item.id
	INNER JOIN item_type
	ON item_type.id = item.type_id ";
	$prepare = mysqli_query($dbconn, $query);
?>
	<div class="modal fade" id="claimed_items" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content-claimed">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title titles" id="add_type" style="color: black;">Claimed Items</h4>
		  </div>
		  <div class="modal-body">
			<div class="table">
			<table class="table table-hover pad">
				<?php 
					printColumnHeaderClaimedItems($prepare, $dbconn);
					printColumnsClaimedItems($prepare);
				?>
			</table>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->