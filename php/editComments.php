<?php
include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	if ($item['position'] == "teacher" OR $item['position'] == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");

	$comment = $_POST['comment'];
	$id_update = $_POST['update_id'];

	$counter = 0;

	foreach ($comment as $item) {
		if (!empty($item)) {
			$id = htmlspecialchars($id_update[$counter]);
			$sql = "UPDATE comment_list SET comment = :item WHERE comment_id = $id";
			prepare_non_query ($sql, $pdo, ['item' => htmlspecialchars($item)]);
			#include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); 
		}
		$counter++;
	}

	if ($_POST['new_comment']) {
		$sql = "INSERT INTO comment_list (comment) VALUES (:item)";
		prepare_non_query ($sql, $pdo, ['item' => htmlspecialchars($_POST[new_comment])]);
		#include ($_SERVER['DOCUMENT_ROOT'] . "/php/par-non_query-sql.php"); 
	}
	header('Location: /editReport.php');
}
else {
	echo "ERROR: NO SUFFICIENT ACCESS";
}
?>
