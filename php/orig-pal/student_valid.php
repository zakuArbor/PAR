<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/php/connect.php"); //connects to wcss_pal database

$student_valid = 1; //teacher has access to edit student report card

try {
	$security_result = $pdo -> query ("SELECT class_id FROM class WHERE teach_id = $_SESSION[user_id] AND class_id = $class_id");
	$row_count = $security_result -> rowCount();
	if ($row_count == 0) {
		$student_valid = 0; //teacher has no access to edit student report card
	}
}
catch(PDOException $e) {
	$student_valid = 0; //teacher has no access to edit student report card
}
?>