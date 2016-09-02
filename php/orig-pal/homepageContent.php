<?php
$message_title = $_POST['messageTitle'];
$message = $_POST['message'];
$notification_title = $_POST['notificationTitle']; 
$notification = $_POST['notification'];
if (!empty($message_title) AND !empty($message)) { 	
	$sql = "UPDATE homePage SET type = 'message', title = '$message_title', content = '$message' WHERE id = 1";	
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}
if (!empty($notification_title) AND !empty($notification)) {	
	$sql = "UPDATE homePage SET type = 'notification', title = '$notification_title', content = '$notification' WHERE id = 2";	
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}
header ('Location: /editSite.php');
?>