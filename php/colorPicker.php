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

	$Pcolor = htmlspecialchars($_POST['Pcolor']);
	$Scolor = htmlspecialchars($_POST['Scolor']);
	$Tcolor = htmlspecialchars($_POST['Tcolor']);
	$Fcolor = htmlspecialchars($_POST['Fcolor']);
	$SFcolor = htmlspecialchars($_POST['SFcolor']);
	$SHcolor = htmlspecialchars($_POST['SHcolor']);


	if (!empty($Pcolor)) { 
	$sql = "UPDATE theme SET color = :Pcolor WHERE type = 'primary'";
	prepare_non_query ($sql, $pdo, ["Pcolor" => $Pcolor]);
	}
	else {
		$sql = "UPDATE theme SET color = '39393a' WHERE type = 'primary'";
		prepare_non_query ($sql, $pdo, []);
	}

	if (!empty($Scolor)) { 
	$sql = "UPDATE theme SET color = :Scolor WHERE type = 'secondary'";
	prepare_non_query ($sql, $pdo, ["Scolor" => $Scolor]);
	}
	else {
		$sql = "UPDATE theme SET color = 'f11313' WHERE type = 'secondary'";
		prepare_non_query ($sql, $pdo, []);
	}

	if (!empty($Tcolor)) { 
	$sql = "UPDATE theme SET color = :Tcolor WHERE type = 'tertiary'";
	prepare_non_query ($sql, $pdo, ["Tcolor" => $Tcolor]);
	}
	else {
		$sql = "UPDATE theme SET color = 'E6E6E6' WHERE type = 'tertiary'";
		prepare_non_query ($sql, $pdo, []);
		
	}

	if (!empty($Fcolor)) { 
	$sql = "UPDATE theme SET color = :Fcolor WHERE type = 'font'";
	prepare_non_query ($sql, $pdo, ["Fcolor" => $Fcolor]);
	}
	else {
		$sql = "UPDATE theme SET color = 'E6E6E6' WHERE type = 'font'";
		prepare_non_query ($sql, $pdo, []);
	}

	if (!empty($SFcolor)) { 
	$sql = "UPDATE theme SET color = :SFcolor WHERE type = 'font2'";
	prepare_non_query ($sql, $pdo, ["SFcolor" => $SFcolor]);
	}
	else {
		$sql = "UPDATE theme SET color = '131414' WHERE type = 'font2'";
		prepare_non_query ($sql, $pdo, []);
	}

	if (!empty($SHcolor)) { 
	$sql = "UPDATE theme SET color = :SHcolor WHERE type = 'shadow'";
	prepare_non_query ($sql, $pdo, ["SHcolor" => $SHcolor]);
	}
	else {
		$sql = "UPDATE theme SET color = '000000' WHERE type = 'shadow'";
		prepare_non_query ($sql, $pdo, []);
	}

	header ('Location: /editSite.php');
}
else {
	echo "NOT SUFFICIENT ACCESS PRIVLEDGE";
}
?>
