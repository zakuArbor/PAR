<?php
include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	//echo $item;
	if ($item['position'] == "teacher" OR $item['position'] == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");
	$id = htmlspecialchars($_GET['delete']);
	$sql = "DELETE FROM comment_list WHERE comment_id = :id";
	prepare_non_query($sql, $pdo, ['id' => $id]);

	echo "<p>$sql</p>";
	header("Location: /editReport.php");
}
else {
	echo "ERROR: NO SUFFICIENT ACCESS";
}
?>