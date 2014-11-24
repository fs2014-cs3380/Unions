<?php
$mainDir = "/students/groups/cs3380f14grp18/public_html/";
require $mainDir . "/includes/header.php";

if (isset($_GET['policy'])) {
	require "policies_get.php";
} else if (isset($_GET['tag'])) {
	require "policies_tag.php";
} else {
	require "policies_main.php";
}

require $mainDir . "/includes/footer.php";
?>
