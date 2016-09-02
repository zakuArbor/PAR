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
		$title = htmlspecialchars($_POST['title']);
		$school = htmlspecialchars($_POST['schoolName']);
		$street = htmlspecialchars($_POST['streetAddress']);
		$location = htmlspecialchars($_POST['location']);
		$postal_code =htmlspecialchars( $_POST['postalCode']);

		if (!empty($title)) {
			$sql = "UPDATE header SET content = :title WHERE id = 1";
			prepare_non_query ($sql, $pdo, ['title'=> $title]);
		}
		if (!empty($school)) {
			$sql = "UPDATE header SET content = :school WHERE id = 2";
			prepare_non_query ($sql, $pdo, ['school'=> $school]);
		}
		if (!empty($street)) {
			$sql = "UPDATE header SET content = :street WHERE id = 3";
			prepare_non_query ($sql, $pdo, ['street'=> $street]);
		}
		if (!empty($location)) {
			$sql = "UPDATE header SET content = :location WHERE id = 4";
			prepare_non_query ($sql, $pdo, ['location'=> $location]);
		}
		if (!empty($postal_code)) {
			$sql = "UPDATE header SET content = :postal_code WHERE id = 5";
			prepare_non_query ($sql, $pdo, ['postal_code'=> $postal_code]);
		}
	header("Location: /editReport.php");
	}
	else {
		echo "NOT SUFFICIENT ACCESS PRIVLEDGE";
	}

?>