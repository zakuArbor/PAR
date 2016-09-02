<?php
$title = $_POST['title'];
$school = $_POST['schoolName'];
$street = $_POST['streetAddress'];
$location = $_POST['location'];
$postal_code = $_POST['postalCode'];

if (!empty($title)) {
	$sql = "UPDATE header SET content = '$title' WHERE id = 1";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); 
}
if (!empty($school)) {
	$sql = "UPDATE header SET content = '$school' WHERE id = 2";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");
}
if (!empty($street)) {
	$sql = "UPDATE header SET content = '$street' WHERE id = 3";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");
}
if (!empty($location)) {
	$sql = "UPDATE header SET content = '$location' WHERE id = 4";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");
}
if (!empty($postal_code)) {
	$sql = "UPDATE header SET content = '$postal_code' WHERE id = 5";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");
}

header("Location: /editReport.php");

?>