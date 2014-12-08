<?php
require "../../includes/header.php";

if (isset($_GET['type']) && isset($_GET['action'])) {
	require "admin_forms.php";
} else {
	require "admin_main.php";
}

require "../../includes/footer.php";
?>
