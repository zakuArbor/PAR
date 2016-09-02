<?php
$message = $_POST['message'];
$footer = $_POST['footer'];

if (!empty($message)) { 
	$sql = "UPDATE footer SET content = '$message' WHERE id = 1 AND type = 'message'";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); 
}
if (!empty($message)) {
	$sql = "UPDATE footer SET content = '$footer' WHERE id = 2 AND type = 'footer'";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); 
}
header("Location: /editReport.php");
?>