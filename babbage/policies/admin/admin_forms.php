<?php
switch ($_GET['type']) {
	case "cat":
		DEFINE("TYPE", "Category");
		break;
	case "pol":
		DEFINE("TYPE", "Policy");
		break;
	case "tag":
		DEFINE("TYPE", "Tag");
		break;
}
switch ($_GET['action']) {
	case "add":
		DEFINE("ACTION", "Add");
		break;
	case "del":
		DEFINE("ACTION", "Delete");
		break;
	case "edit":
		DEFINE("ACTION", "Edit");
		break;
}
?>
<h1><a href="./">Admin Portal</a> - <?php echo ACTION ?> <?php echo TYPE ?></h1>
<?php
switch ($_GET['action']) {
	case "add":
		require "form_add.php";
		break;
	case "del":
		require "form_delete.php";
		break;
	case "edit":
		require "form_edit.php";
		break;
}
?>