
<?php
$Pcolor = $_POST['Pcolor'];
$Scolor = $_POST['Scolor'];
$Tcolor = $_POST['Tcolor'];
$Fcolor = $_POST['Fcolor'];
$SFcolor = $_POST['SFcolor'];
$SHcolor = $_POST['SHcolor'];


if (!empty($Pcolor)) { 
$sql = "UPDATE theme SET color = '$Pcolor' WHERE type = 'primary'";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}
else {
	$sql = "UPDATE theme SET color = '39393a' WHERE type = 'primary'";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}

if (!empty($Scolor)) { 
$sql = "UPDATE theme SET color = '$Scolor' WHERE type = 'secondary'";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}
else {
	$sql = "UPDATE theme SET color = 'f11313' WHERE type = 'secondary'";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}

if (!empty($Tcolor)) { 
$sql = "UPDATE theme SET color = '$Tcolor' WHERE type = 'tertiary'";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}
else {
	$sql = "UPDATE theme SET color = 'E6E6E6' WHERE type = 'tertiary'";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
	
}

if (!empty($Fcolor)) { 
$sql = "UPDATE theme SET color = '$Fcolor' WHERE type = 'font'";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}
else {
	$sql = "UPDATE theme SET color = 'E6E6E6' WHERE type = 'font'";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}

if (!empty($SFcolor)) { 
$sql = "UPDATE theme SET color = '$SFcolor' WHERE type = 'font2'";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}
else {
	$sql = "UPDATE theme SET color = '131414' WHERE type = 'font2'";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}

if (!empty($SHcolor)) { 
$sql = "UPDATE theme SET color = '$SHcolor' WHERE type = 'shadow'";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}
else {
	$sql = "UPDATE theme SET color = '000000' WHERE type = 'shadow'";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
}

header ('Location: /editSite.php');
?>
