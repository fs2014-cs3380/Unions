<?php
//Connecting, selecting database
$dbconn = pg_connect(CONNSTRING)
    or die('Could not connect: ' . pg_last_error());

$policies_query = "SELECT title, text, update_time FROM policy WHERE policy_id = " . $_GET['policy'] . " ORDER BY title ASC";
$policies_result = pg_query($policies_query) or die('Query failed: ' . pg_last_error());

while ($policies_line = pg_fetch_array($policies_result, null, PGSQL_BOTH)) {
	echo "\t\t\t\t<h1>$policies_line[0]</h1>\n";
	echo "\t\t\t\t" . htmlspecialchars_decode($policies_line[1]) . "\n";
	echo "\t\t\t\t<div id=\"bottom\">\n";
	echo "\t\t\t\t\t<div id=\"bottom_left\">Tags: \n";
	
	$tags_query = "SELECT tagged.tag_id, tags.tag FROM tagged JOIN tags USING (tag_id) WHERE tagged.policy_id = " . $_GET['policy'] . " ORDER BY tags.tag ASC";
	$tags_result = pg_query($tags_query) or die('Query failed: ' . pg_last_error());
	
	while ($tags_line = pg_fetch_array($tags_result, null, PGSQL_BOTH)) {
		echo "\t\t\t\t\t\t<div class=\"tag\">#<a href=\"?tag=$tags_line[0]\">$tags_line[1]</a></div>\n";
	}
	
	echo "\t\t\t\t\t</div>\n";
	echo "\t\t\t\t\t<div id=\"bottom_right\">Last Updated: $policies_line[2]</div>\n";
	echo "\t\t\t\t</div>\n";
}

//Free resultset
pg_free_result($tags_result);
pg_free_result($policies_result);

//Closing connection
pg_close($dbconn);
?>
