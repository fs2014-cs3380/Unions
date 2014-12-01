<!-- Edit item modal -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="myModalLabel">Edit</h4>
	  </div>
	  <div class="modal-body">
<form name="update" class="" action="index.php" method="post">
<?php
	/*$query = "SELECT item.description,location,found_date, found_user, type_id , item_status.description
	FROM item 
	INNER JOIN item_status
	ON item.status_id = item_status.id
	WHERE item.id = ?";
	$stmt = mysqli_prepare($dbconn, $query);
	$test = "45";
	mysqli_stmt_bind_param($stmt, "s", $test);
	$execute = mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $description,$location, $date, $found_user, $item_type, $status);
	mysqli_stmt_fetch($stmt);
	mysqli_stmt_close($stmt);*/
?>

		<input type="hidden" name="content" value="update" />
		<input type="hidden" name="id" id="id" value="" />
		<input type="hidden" name="action" value="update" />
		<div class="header">
			<span class="info">Please update the following information</span><hr>
		</div>

		<div class="information">
			Item Status:<br><br>
			<select class="box" name="status" id="status" onchange="checkItemStatus()">
				<?php global $dbconn;
						$query = "SELECT * FROM item_status ";
						$result = mysqli_query($dbconn, $query);
						while($r = mysqli_fetch_assoc($result)){
							$selected = NULL;
							echo '<span class="space"><option value="'.$r['id'].'" '.$selected.'>'.$r['description'].'</option>';
							
						}
				?>
			</select><hr>
		</div>
		<div class="itemClaimed" id="claim-form">
				Who claimed the item:<br><br>
				First Name:<span class="space"></span><input type="text" name="first_name" id="first_name" placeholder="First Name" class= "box searchFieldText"/><span class="tab"></span>
				Last Name:<span class="space"></span><input type="text" name="last_name" id="last_name" placeholder="Last Name" class= "box searchFieldText"/><br><br>
				Email:<span class="space"></span><input type="email" name="email" id="email" placeholder="Email" class= "box searchFieldText"/>
				<hr>		
		</div>
		<div class="information">
			Item Description:<br><br>
				<textarea name="description" class="description searchFieldText" id="description" onMousedown="clear" ></textarea>
		</div><hr>

		<div class="footer">
			<input type="button" name="update" class="btn btn-default" value="Update" onclick="updateRecord('id', 'status','first_name', 'last_name', 'email', 'description')"><span class="tab">
			<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
	</form>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- end Add item modal -->