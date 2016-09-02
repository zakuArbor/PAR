<?php
$type = $_POST['type'];

echo "test";
if ($type == 1) {
	$id = 68;
}
else if ($type == 2) {
	$id = 20;#20
}

$sql = "SELECT * FROM users WHERE id =$id";#68
include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$log_user = $results->fetch(PDO::FETCH_ASSOC); //fetches only one* row of the result set into $logUser
session_start();
$_SESSION['user_id'] = $log_user['id'];
$_SESSION['first'] = $log_user['first_name'];
$_SESSION['last'] = $log_user['last_name'];

$sql = "SELECT permission_type FROM permission WHERE permission_id = $log_user[id]";
include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
foreach ($results as $permission) {
	$_SESSION['permissions'][] = $permission['permission_type'];
}

header('Location: /');

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
