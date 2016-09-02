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
	$message = htmlspecialchars($_POST['message']);
	$footer = htmlspecialchars($_POST['footer']);

	if (!empty($message)) { 
		$sql = "UPDATE footer SET content = :message WHERE id = 1 AND type = 'message'";
		prepare_non_query ($sql, $pdo, ["message" => $message]);
	}
	if (!empty($message)) {
		$sql = "UPDATE footer SET content = :footer WHERE id = 2 AND type = 'footer'";
		prepare_non_query ($sql, $pdo, ["footer" => $footer]);
	}
	header("Location: /editReport.php");
}
else {
	echo "NOT SUFFICIENT ACCESS PRIVLEDGE";
}
?>