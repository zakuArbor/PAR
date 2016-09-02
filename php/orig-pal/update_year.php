<?php
$i = 0;
if ($_POST['current_default'] != $_POST['year_id']) {
	$sql = "UPDATE `year` SET `default` = 1 WHERE `year_id` = $_POST[year_id]";
	echo "$sql<br>";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL query
	$sql = "UPDATE `year` SET `default` = 0 WHERE `year_id` = $_POST[current_default]";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL query
	echo "$sql<br>";	
}
?>