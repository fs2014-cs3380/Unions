<?php
if (!isset($_GET['type']) || !isset($_GET['action']) || !isset($_GET['id'])) {
	header("location: ./");
}

if (isset($_POST['submit'])) {
	switch (TYPE) {
		case "Category":
			if (preg_match("/</", $_POST['name']) > 0 || preg_match("/\;/", $_POST['name']) > 0) {
				customError("There was an error adding \"" . htmlspecialchars($_POST['name']) . "\": HTML and SQL injection is not allowed.");
			}
			
			$result = pg_prepare($dbconn, "update", 'UPDATE category SET name = $1, update_user_id = $2, update_time = DEFAULT WHERE category_id = $3');
			$result = pg_execute($dbconn, "update", array(htmlspecialchars($_POST['name']), 0, $_GET['id']));
			if (!$result) {
				customError('Query failed.');
			} else {
				customNotice('Category "' . htmlspecialchars($_POST['name']) . '" was successfully updated.');
			}
			break;
		case "Policy":
			if (preg_match("/</", $_POST['title']) > 0 || preg_match("/\;/", $_POST['title']) > 0) {
				customError("There was an error adding \"" . htmlspecialchars($_POST['title']) . "\": HTML and SQL injection is not allowed.");
			}
			
			$result = pg_prepare($dbconn, "update", 'UPDATE policy SET title = $1, text = $2, category_id = $3, update_user_id = $4, update_time = DEFAULT WHERE policy_id = $5');
			$result = pg_execute($dbconn, "update", array(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['text']), $_POST['category'], 0, $_GET['id']));
			if (!$result) {
				customError('Query failed.');
			}
			
			$to_del = array();
			foreach ($_POST['tags_old'] as $tag) {
				if (!in_array($tag, $_POST['tags'])) { $to_del[] = $tag; }
			}
			$result = pg_prepare($dbconn, "delete_tags", 'DELETE FROM tagged WHERE policy_id = $1 AND tag_id = $2');
			foreach ($to_del as $tag) {
				$result = pg_execute($dbconn, "delete_tags", array($_GET['id'], $tag));
				if (!$result) {
					customError('Query failed.');
				}
			}
			
			$to_add = array();
			foreach ($_POST['tags'] as $tag) {
				if (!in_array($tag, $_POST['tags_old'])) { $to_add[] = $tag; }
			}
			$result = pg_prepare($dbconn, "insert_tags", 'INSERT INTO tagged(policy_id, tag_id) VALUES ($1, $2)');
			foreach ($to_add as $tag) {
				$result = pg_execute($dbconn, "insert_tags", array($_GET['id'], $tag));
				if (!$result) {
					customError('Query failed.');
				}
			}
			
			customNotice('Policy "' . htmlspecialchars($_POST['title']) . '" was successfully updated.');
			break;
		case "Tag":
			if (preg_match("/</", $_POST['tag']) > 0 || preg_match("/\;/", $_POST['tag']) > 0) {
				customError("There was an error adding \"" . htmlspecialchars($_POST['tag']) . "\": HTML and SQL injection is not allowed.");
			}
			
			$result = pg_prepare($dbconn, "update", 'UPDATE tag SET tag = $1 WHERE tag_id = $2');
			$result = pg_execute($dbconn, "update", array(htmlspecialchars($_POST['tag']), $_GET['id']));
			if (!$result) {
				customError('Query failed.');
			} else {
				customNotice('Tag "' . htmlspecialchars($_POST['tag']) . '" was successfully updated.');
			}
			break;
	}

	//Free resultset
	pg_free_result($result);
} else {
?>
<div class="box">
	<div class="box_content">
		<form action="?type=<?php echo $_GET['type'] ?>&action=<?php echo $_GET['action'] ?>&id=<?php echo $_GET['id'] ?>" method="post">
<?php
	switch (TYPE) {
		case "Category":
			$query = "SELECT name FROM category WHERE category_id = " . $_GET['id'];
			$result = pg_query($query);
			if (!$result) {
				customError('Query failed.');
			}
			$results = pg_fetch_array($result, null, PGSQL_BOTH);
			echo "\t\t\t<p><label for=\"name\">Category Name</label> <input type=\"text\" name=\"name\" style=\"width: 200px;\" title=\"HTML and SQL not accepted\" value=\"$results[0]\"></p>\n";
			break;
		case "Policy":
			$query = "SELECT title, category_id, text FROM policy WHERE policy_id = " . $_GET['id'];
			$result = pg_query($query);
			if (!$result) {
				customError('Query failed.');
			}
			$results = pg_fetch_array($result, null, PGSQL_BOTH);
			echo "\t\t\t<p><label for=\"title\" style=\"width: 100px; display:block; float:left;\">Policy Title</label> <input type=\"text\" id=\"title\" name=\"title\" style=\"width: 200px;\" title=\"HTML and SQL not accepted\" value=\"$results[0]\"></p>\n";
			echo "\t\t\t<p>\n";
			echo "\t\t\t\t<label for=\"category\" style=\"width: 100px; display:block; float:left;\">Category</label></label>\n";
			echo "\t\t\t\t<select id=\"category\" name=\"category\">\n";
			
			$categories_query = "SELECT category_id, name FROM category ORDER BY name ASC";
			$categories_result = pg_query($categories_query);
			if (!$categories_result) {
				customError('Query failed.');
			}
			
			// print out the results
			while ($categories_line = pg_fetch_array($categories_result, null, PGSQL_BOTH)) {
				echo "\t\t\t\t\t<option value=\"$categories_line[0]\"";
				if ($categories_line[0] == $results[1]) { echo " selected"; }
				echo ">$categories_line[1]</option>\n";
			}
			
			
			echo "\t\t\t\t</select>\n";
			echo "\t\t\t</p>\n";
			echo "\t\t\t<p>\n";
			echo "\t\t\t\t<label for=\"text\" style=\"width: 100px; display:block; float:left;\">Policy Text</label>\n";
			echo "\t\t\t\t<textarea id=\"text\" name=\"text\" title=\"Accepts HTML code; no SQL accepted.\" style=\"width: 784px; height: 200px;\">$results[2]</textarea>\n";
			echo "\t\t\t</p>\n";
			echo "\t\t\t<p>\n";
			echo "\t\t\t\t<label for=\"tags\" style=\"width: 100px; display:block; float:left;\">Tags</div></label>\n";
			
			$tagged_query = "SELECT tag_id FROM tagged WHERE policy_id = " . $_GET['id'];
			$tagged_result = pg_query($tagged_query);
			if (!$tagged_result) {
				customError('Query failed.');
			}
			$tags_array = array();
			while ($result_line = pg_fetch_array($tagged_result, null, PGSQL_BOTH)) {
				$tags_array[] = $result_line[0];
			}
			
			$tags_query = "SELECT tag_id, tag FROM tag ORDER BY tag ASC";
			$tags_result = pg_query($tags_query);
			if (!$tags_result) {
				customError('Query failed.');
			}
			echo "\t\t\t\t<select name=\"tags[]\" multiple size=\"10\">\n";
			while ($tags_line = pg_fetch_array($tags_result, null, PGSQL_BOTH)) {
				echo "\t\t\t\t\t<option value=\"$tags_line[0]\"";
				if (in_array($tags_line[0], $tags_array)) { echo " selected"; }
				echo ">$tags_line[1]</option>\n";
			}
			echo "\t\t\t\t</select>\n";
			
			$tags_result = pg_query($tags_query);
			if (!$tags_result) {
				customError('Query failed.');
			}
			echo "\t\t\t\t<select name=\"tags_old[]\" multiple size=\"10\" style=\"display: none;\">\n";
			while ($tags_line = pg_fetch_array($tags_result, null, PGSQL_BOTH)) {
				echo "\t\t\t\t\t<option value=\"$tags_line[0]\"";
				if (in_array($tags_line[0], $tags_array)) { echo " selected"; }
				echo ">$tags_line[1]</option>\n";
			}
			echo "\t\t\t\t</select>\n";
			
			//Free resultset
			pg_free_result($categories_result);
			pg_free_result($tagged_result);
			pg_free_result($tags_result);
			
			echo "\t\t\t\t<br>\n";
			echo "\t\t\t\t<small><small>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</small></small>\n";
			echo "\t\t\t</p>\n";
			break;
		case "Tag":
			$query = "SELECT tag FROM tag WHERE tag_id = " . $_GET['id'];
			$result = pg_query($query);
			if (!$result) {
				customError('Query failed.');
			}
			$results = pg_fetch_array($result, null, PGSQL_BOTH);
			echo "\t\t\t<p><label for=\"tag\">Tag Name</label> <input type=\"text\" id=\"tag\" name=\"tag\" style=\"width: 200px;\" title=\"HTML and SQL not accepted\" value=\"$results[0]\"></p>\n";
			break;
	}
	
	//Free resultset
	pg_free_result($result);
?>
			<p><center><input type="submit" name="submit" value="Save the changes of <?php echo $results[0] ?>"></center></p>	
		</form>
	</div>
</div>
<?php
}
?>