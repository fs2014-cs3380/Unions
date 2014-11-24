<?php
if (isset($_POST['submit'])) {
	switch (TYPE) {
		case "Category":
			if (preg_match("/</", $_POST['name']) > 0 || preg_match("/\;/", $_POST['name']) > 0) {
				customError("There was an error adding \"" . htmlspecialchars($_POST['name']) . "\": HTML and SQL injection is not allowed.");
			}
			
			$result = pg_prepare($dbconn, "insert", 'INSERT INTO category(name, create_user_id, update_user_id) VALUES ($1, $2, $2)');
			$result = pg_execute($dbconn, "insert", array(htmlspecialchars($_POST['name']), 1));
			if (!$result) {
				customError('Query failed.');
			} else {
				customNotice('Category ' . htmlspecialchars($_POST['name']) . ' was successfully added.');
			}
			break;
	}

	//Free resultset
	pg_free_result($result);
} else {
$parent = "";
?>
<div class="box">
	<div class="box_content">
		<form action="?type=<?php echo $_GET['type'] ?>&action=<?php echo $_GET['action'] ?>" method="post" autocomplete="off">
<?php
	switch (TYPE) {
		case "Category":
?>
			<p><label for="name">Category Name</label> <input type="text" name="name" style="width: 200px;" placeholder="HTML and SQL not accepted"></p>
<?php
			break;
		case "Policy":
?>
			<p>
				<label for="<?php echo $parent ?>"><?php echo $parent ?></label>
				<select name="<?php echo $parent ?>">
				</select>
			</p>
			<p>
				<label for="text"><?php echo TYPE ?> Text</label> 
				<textarea name="title" placeholder="Accepts HTML code" style="vertical-align: middle; width: 785px; height: 200px;"></textarea>
			</p>
<?php
			break;
	}
?>
			<p><center><input type="submit" name="submit" value="Add <?php echo TYPE ?>"></center></p>	
		</form>
	</div>
</div>
<?php
}
?>