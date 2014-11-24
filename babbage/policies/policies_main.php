			<h1>Policies <span style="font-size: 10pt;">(<a href="admin/">Admin</a>)</span></h1>
			<p>The Missouri Student Unions - Memorial Student Union and the MU Student Center - serve as community centers on the University of Missouri campus. They provide quality facilities, services and conveniences for all the students, faculty, staff and guests of the University. As programming and event centers, the Missouri Student Unions are a welcoming environment for meeting, socializing, learning and developing.</p>
			<p>The Missouri Student Unions enforces all M-Book policies as it relates to events and requests within the Missouri Student Unions facilities.&#160; Further information about the M-Book can be found <a href="http://conduct.missouri.edu/wp-content/uploads/2012/08/M-Book-FINAL-PDF-COMBINED_2012-2013.pdfhttp:/conduct.missouri.edu/wp-content/uploads/2012/08/M-Book-FINAL-PDF-COMBINED_2012-2013.pdf" target="_blank">here</a>.</p>
			<h2>Our Policy On...</h2>
<?php
$categories_query = "SELECT category_id, name FROM category ORDER BY name ASC";
$categories_result = pg_query($categories_query);
if (!$dbconn) {
	customError('Query failed.');
}

// print out the results
$i = 1;
while ($categories_line = pg_fetch_array($categories_result, null, PGSQL_BOTH)) {
	if ($i == 1) {
		echo "\t\t\t<div id=\"columns\">\n";
	}
	echo "\t\t\t\t<div class=\"column\">\n";
	echo "\t\t\t\t\t\t<h3>$categories_line[1]</h3>\n";
	echo "\t\t\t\t\t<ul>\n";
	
	$policies_query = "SELECT policy_id, title FROM policy WHERE category_id = $categories_line[0] ORDER BY title ASC";
	$policies_result = pg_query($policies_query);
	if (!$dbconn) {
		customError('Query failed.');
	}
	
	while ($policies_line = pg_fetch_array($policies_result, null, PGSQL_BOTH)) {
		echo "\t\t\t\t\t\t<li><a href=\"?policy=$policies_line[0]\">" . htmlspecialchars_decode($policies_line[1]) . "</a></li>\n";
	}
	
	echo "\t\t\t\t\t</ul>\n";
	echo "\t\t\t\t</div>\n";
	if ($i == 3) {
		echo "\t\t\t</div>\n";
		$i = 1;
	} else {
		$i = $i + 1;
	}
}

//Free resultset
pg_free_result($policies_result);
pg_free_result($categories_result);
?>
