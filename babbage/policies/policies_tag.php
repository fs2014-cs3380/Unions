<?php
//Connecting, selecting database
$dbconn = pg_connect(CONNSTRING)
    or die('Could not connect: ' . pg_last_error());

$tags_query = "SELECT tag FROM tags WHERE tag_id = " . $_GET['tag'];
$tags_result = pg_query($tags_query) or die('Query failed: ' . pg_last_error());

$tags_line = pg_fetch_array($tags_result, null, PGSQL_BOTH);
echo "\t\t\t\t<h1>Policies that are tagged #$tags_line[0]</h1>\n";

// echo "\t\t\t\t" . htmlspecialchars_decode($policies_line[1]) . "\n";
// echo "\t\t\t\t<div id=\"bottom\">\n";
// echo "\t\t\t\t\t<div id=\"bottom_left\">Tags: \n";

$policies_query = "SELECT policy.policy_id, policy.title, policy.text FROM tagged JOIN policy USING (policy_id) WHERE tagged.tag_id = " . $_GET['tag'] . " ORDER BY policy.title ASC";
$policies_result = pg_query($policies_query) or die('Query failed: ' . pg_last_error());

while ($policies_line = pg_fetch_array($policies_result, null, PGSQL_BOTH)) {
	echo "\t\t\t\t<div class=\"box\">\n";
	echo "\t\t\t\t\t<div class=\"box_title\"><h1><a href=\"?policy=$policies_line[0]\">$policies_line[1]</a></h1></div>\n";
	
	$sanitized = $policies_line[2];
 	$sanitized = preg_replace('/&lt;li&gt;/U', ' ', $sanitized);
 	$sanitized = preg_replace('/&lt;\/.+&gt;/U', '', $sanitized);
 	$sanitized = preg_replace('/&lt;.+&gt;/U', '', $sanitized);
 	$sanitized = preg_replace('/(\.)([A-Z])/', '$1 $2', $sanitized);

	
	echo "\t\t\t\t\t<div class=\"box_content\">" . mb_substr($sanitized, 0, 300) . "...</div>\n";
	echo "\t\t\t\t</div>\n";
}

//Free resultset
pg_free_result($tags_result);
pg_free_result($policies_result);

//Closing connection
pg_close($dbconn);
?>
