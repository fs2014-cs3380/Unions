<?php
$query = "SELECT category_id, name FROM category ORDER BY name ASC";
$result = pg_query($query);
if (!$dbconn) {
	customError('Query failed.');
}
$cats = pg_num_rows($result);
$categories = array();
while ($result_line = pg_fetch_array($result, null, PGSQL_BOTH)) {
	$categories[$result_line[0]] = $result_line[1];
}

$query = "SELECT policy_id, title FROM policy";
$result = pg_query($query);
if (!$dbconn) {
	customError('Query failed.');
}
$pols = pg_num_rows($result);
$policies = array();
while ($result_line = pg_fetch_array($result, null, PGSQL_BOTH)) {
	$policies[$result_line[0]] = $result_line[1];
}

$query = "SELECT tag_id, tag FROM tags";
$result = pg_query($query);
if (!$dbconn) {
	customError('Query failed.');
}
$tags = pg_num_rows($result);
$tags_array = array();
while ($result_line = pg_fetch_array($result, null, PGSQL_BOTH)) {
	$tags_array[$result_line[0]] = $result_line[1];
}

//Free resultset
pg_free_result($result);

$user = "&lt;username&gt;";
?>
<h1 style="margin-bottom: 0px;">Policy Admin Portal</h1>
<small>Note: adding, removing, and editing a policy's tag(s) can be done in the policy > edit menu.</small>
<div id="accordion-resizer" class="ui-widget-content">
	<div id="accordion">
		<h3 style="font: 80% 'Trebuchet MS', sans-serif;">Categories - <small><?php echo $cats ?> total</small><button class="form_button" style="float: right;" onclick="window.location.href = '?type=cat&action=add';">Add</button></h3>
		<div>
			<table>
				<tr>
					<th colspan="2">Actions</th>
					<th>Category Name</th>
				</tr>
<?php
foreach ($categories as $key => $value) {
	echo "\t\t\t\t<tr>\n";
	echo "\t\t\t\t\t<td><button class=\"form_button\">Edit</button></td><td><button class=\"form_button\">Delete</button></td><td width=\"100%\">$value</td>\n";
	echo "\t\t\t\t</tr>\n";
}
?>
			</table>
		</div>
		<h3 style="font: 80% 'Trebuchet MS', sans-serif;">Policies - <small><?php echo $pols ?> total</small><button class="form_button" style="float: right;" onclick="window.location.href = '?type=pol&action=add';">Add</button></h3>
		<div>
			<table>
				<tr>
					<th colspan="2">Actions</th>
					<th>Policy Title</th>
				</tr>
<?php
foreach ($policies as $key => $value) {
	echo "\t\t\t\t<tr>\n";
	echo "\t\t\t\t\t<td><button class=\"form_button\">Edit</button></td><td><button class=\"form_button\">Delete</button></td><td width=\"100%\">" . htmlspecialchars_decode($value) . "</td>\n";
	echo "\t\t\t\t</tr>\n";
}
?>
			</table>
		</div>
		<h3 style="font: 80% 'Trebuchet MS', sans-serif;">Tags - <small><?php echo $tags ?> total</small><button class="form_button" style="float: right;" onclick="window.location.href = '?type=tag&action=add';">Add</button></h3>
		<div>
			<table>
				<tr>
					<th colspan="2">Actions</th>
					<th>Tag Name</th>
				</tr>
<?php
foreach ($tags_array as $key => $value) {
	echo "\t\t\t\t<tr>\n";
	echo "\t\t\t\t\t<td><button class=\"form_button\">Edit</button></td><td><button class=\"form_button\">Delete</button></td><td width=\"100%\">$value</td>\n";
	echo "\t\t\t\t</tr>\n";
}
?>
			</table>
		</div>
	</div>
</div>
<script>
	$(function() {
		var heightDiff = $(window).height() - 156;
		$("#accordion-resizer").css("height", heightDiff + "px");
		$( ".form_button" ).button();
		$( "#accordion" ).accordion({
			collapsible: true,
			minHeight: 140,
			minWidth: 200,
			heightStyle: "fill"
		});
	});
</script>
<style>
	#accordion-resizer {
		padding: 10px;
		width: 97%;
	}
	.ui-button-text { font-size: .1em; }
</style>
