<?php
//$mainDir = "/students/groups/cs3380f14grp18/public_html/";
$mainDir = "/Users/pcpopper/Unions/babbage/";

require $mainDir . "/includes/header.php";

if (isset($_GET['type']) && isset($_GET['action'])) {
	require "admin_forms.php";
} else {
	require "admin_main.php";
}

require $mainDir . "/includes/footer.php";
?>
