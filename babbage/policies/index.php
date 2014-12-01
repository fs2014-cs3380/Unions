<?php

require "../includes/header.php";

if (isset($_GET['policy'])) {
	require "policies_get.php";
} else if (isset($_GET['tag'])) {
	require "policies_tag.php";
} else {
	require "policies_main.php";
}

require "../includes/footer.php";
?>
