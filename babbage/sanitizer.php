<form method="post">
<textarea cols=2 rows=5 style="width:49%; height:550px;" name=original></textarea>
<textarea cols=2 rows=5 style="width:50%; height:550px;" name=sanitized>
<?php
if (isset($_POST['original'])) {
	$sanitized = $_POST['original'];
	$sanitized = str_replace('"', '&amp;quote;', $sanitized);
	$sanitized = str_replace("<", "&amp;lt;", $sanitized);
	$sanitized = str_replace('>', '&amp;gt;', $sanitized);
	$sanitized = str_replace("&#160;", " ", $sanitized);
	$sanitized = preg_replace("/\r|\n/", "", $sanitized);
	echo $sanitized;
}
?>
</textarea><br>
<input type=submit value=submit>
</form>
