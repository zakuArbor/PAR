<?php
include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	echo $item;
	if ($item['position'] == "teacher" OR $item['position'] == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");
	$message_title = htmlspecialchars($_POST['messageTitle']);
	$message = $_POST['message'];
	$notification_title = htmlspecialchars($_POST['notificationTitle']); 
	$notification = $_POST['notification'];

	if (!empty($message_title) AND !empty($message)) { 	
		$sql = "UPDATE homePage SET type = 'message', title = :message_title, content = :message WHERE id = 1";	
		prepare_non_query ($sql, $pdo, ["message_title" => $message_title,"message" => $message]);
	}
	if (!empty($notification_title) AND !empty($notification)) {	
		$sql = "UPDATE homePage SET type = 'notification', title = :notification_title, content = :notification WHERE id = 2";	
		prepare_non_query ($sql, $pdo, ["notification_title" => $notification_title,"notification" => $notification]);
	}
	header ('Location: /editSite.php');
}
else {
	echo "NOT SUFFICIENT ACCESS PRIVLEDGE";
}
?>