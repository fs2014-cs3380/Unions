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
				customNotice('Category \"' . htmlspecialchars($_POST['name']) . '\" was successfully added.');
			}
			break;
		case "Policy":
			if (preg_match("/</", $_POST['title']) > 0 || preg_match("/\;/", $_POST['title']) > 0) {
				customError("There was an error adding \"" . htmlspecialchars($_POST['title']) . "\": HTML and SQL injection is not allowed.");
			}
			
// 			$result = pg_prepare($dbconn, "insert", 'INSERT INTO policy(title, text, category_id, create_user_id, update_user_id) VALUES ($1, $2, $3, $4, $4) RETURNING policy_id');
// 			$result = pg_execute($dbconn, "insert", array(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['text']), $_POST['category'], 1));
// 			if (!$result) {
// 				customError('Query failed.');
// 			} else {
// 				customNotice('Policy "' . htmlspecialchars($_POST['title']) . '" was successfully added. ' . pg_fetch_array($result, null, PGSQL_BOTH)[0]);
// 			}
			
// 			$result = pg_prepare($dbconn, "insert", 'INSERT INTO tagged(policy_id, tag_id) VALUES ($1, $2)');
			
			break;
		case "Tag":
			if (preg_match("/</", $_POST['tag']) > 0 || preg_match("/\;/", $_POST['tag']) > 0) {
				customError("There was an error adding \"" . htmlspecialchars($_POST['tag']) . "\": HTML and SQL injection is not allowed.");
			}
			
			$result = pg_prepare($dbconn, "insert", 'INSERT INTO tags(tag) VALUES ($1)');
			$result = pg_execute($dbconn, "insert", array(htmlspecialchars($_POST['tag'])));
			if (!$result) {
				customError('Query failed.');
			} else {
				customNotice('Tag \"' . htmlspecialchars($_POST['tag']) . '\" was successfully added.');
			}
			break;
	}

	//Free resultset
	pg_free_result($result);
} else {
?>
<div class="box">
	<div class="box_content">
		<form action="?type=<?php echo $_GET['type'] ?>&action=<?php echo $_GET['action'] ?>" method="post">
<?php
	switch (TYPE) {
		case "Category":
			echo "\t\t\t<p><label for=\"name\">Category Name</label> <input type=\"text\" name=\"name\" style=\"width: 200px;\" placeholder=\"HTML and SQL not accepted\"></p>\n";
			break;
		case "Policy":
			echo "\t\t\t<p><label for=\"title\" style=\"width: 100px; display:block; float:left;\">Policy Title</label> <input type=\"text\" id=\"title\" name=\"title\" style=\"width: 200px;\" placeholder=\"HTML and SQL not accepted\"></p>\n";
			echo "\t\t\t<p>\n";
			echo "\t\t\t\t<label for=\"category\" style=\"width: 100px; display:block; float:left;\">Category</label></label>\n";
			echo "\t\t\t\t<select id=\"category\" name=\"category\">\n";
			
			$categories_query = "SELECT category_id, name FROM category ORDER BY name ASC";
			$categories_result = pg_query($categories_query);
			if (!$dbconn) {
				customError('Query failed.');
			}
			
			// print out the results
			while ($categories_line = pg_fetch_array($categories_result, null, PGSQL_BOTH)) {
				echo "\t\t\t\t\t<option value=\"" . $categories_line[0] . "\">" . $categories_line[1] . "</option>\n";
			}
			
			//Free resultset
			pg_free_result($categories_result);
			
			echo "\t\t\t\t</select>\n";
			echo "\t\t\t</p>\n";
			echo "\t\t\t<p>\n";
			echo "\t\t\t\t<label for=\"text\" style=\"width: 100px; display:block; float:left;\">Policy Text</label>\n";
			echo "\t\t\t\t<textarea id=\"text\" name=\"text\" placeholder=\"Accepts HTML code; no SQL accepted.\" style=\"width: 784px; height: 200px;\"></textarea>\n";
			echo "\t\t\t</p>\n";
			echo "\t\t\t<p>\n";
			echo "\t\t\t\t<label for=\"tags\" style=\"width: 100px; display:block; float:left;\">Tags</div></label>\n";
			echo "\t\t\t\t<select name=\"tags\" multiple size=\"10\">\n";
			
			$tags_query = "SELECT tag_id, tag FROM tags ORDER BY tag ASC";
			$tags_result = pg_query($tags_query);
			if (!$dbconn) {
				customError('Query failed.');
			}
			
			// print out the results
			while ($tags_line = pg_fetch_array($tags_result, null, PGSQL_BOTH)) {
				echo "\t\t\t\t\t<option value=\"" . $tags_line[0] . "\">" . $tags_line[1] . "</option>\n";
			}
			
			//Free resultset
			pg_free_result($tags_result);
			
			echo "\t\t\t\t</select>\n";
			echo "\t\t\t\t<br>\n";
			echo "\t\t\t\t<small><small>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</small></small>\n";
			echo "\t\t\t</p>\n";
			break;
		case "Tag":
			echo "\t\t\t<p><label for=\"tag\">Tag Name</label> <input type=\"text\" id=\"tag\" name=\"tag\" style=\"width: 200px;\" placeholder=\"HTML and SQL not accepted\"></p>\n";
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