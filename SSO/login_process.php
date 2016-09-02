<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/php/prepare_sql.php");
$type = $_POST['type'];

if ($type == 1) {
	$id = 1;
}
else if ($type == 2) {
	$id = 2;#20
}

$sql = "SELECT * FROM staff WHERE staff_id = :id";#68
$log_user = single_return_prepare_select($sql, $pdo, ['id' => $id]);
session_start();
$_SESSION['id'] = $log_user['staff_id'];
$_SESSION['first'] = $log_user['staff_first'];
$_SESSION['last'] = $log_user['staff_last'];

$sql = "SELECT position FROM staff_position INNER JOIN position ON position.position_type_id = staff_position.position_type_id
		WHERE staff_id = :id";
$_SESSION['permissions'] = array_prepare_select ($sql, $pdo, ['id' => $log_user['staff_id']]);

header ("Location: ../index.php");
?>


<?php
/*$username = $_POST['username'];
$password = $_POST['password'];
$sso_sql = "SELECT * FROM users WHERE users.username = '$username' AND password = '$password'";
include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
echo "test";
$log_user = $results->fetch(PDO::FETCH_ASSOC); //fetches only one* row of the result set into $logUser
if ($count_affected == 1) {
		session_start();
		$_SESSION['user_id'] = $log_user['username'];
		$_SESSION['first'] = $log_user['first_name'];
		$_SESSION['last'] = $log_user['last_name'];
		
		$sso_sql = "SELECT permission_type FROM permission WHERE permission_id = $log_user[id]";
		include $_SERVER['DOCUMENT_ROOT'] . "/SSO/sso-sql.php";
		foreach ($results as $permission) {
			$_SESSION['permissions'][] = $permission['permission_type'];
		}
		echo "<br>$sso_sql";
		print_r($_SESSION['permissions']);
		header('Location: /');
}
else {
	echo "<p>ERROR: INCORRECT USERNAME OR PASSWORD</p>";
}*/
?>
