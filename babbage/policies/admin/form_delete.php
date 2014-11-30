<?php
switch (TYPE) {
	case "Category":
		$result = pg_prepare($dbconn, "delete", 'DELETE FROM category WHERE category_id = $1');
		break;
	case "Policy":
		$result = pg_prepare($dbconn, "delete", 'DELETE FROM policy WHERE policy_id = $1');
		break;
	case "Tag":
		$result = pg_prepare($dbconn, "delete", 'DELETE FROM tags WHERE tag_id = $1');
		break;
}
$result = pg_execute($dbconn, "delete", array($_GET['id']));
if (!$result) {
	customError('Query failed.');
} else {
	customNotice(TYPE . ' "' . htmlspecialchars($_GET['value']) . '" was successfully removed.');
}

//Free resultset
pg_free_result($result);
?>
