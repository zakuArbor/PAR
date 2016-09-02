<?php
include ($_SERVER['DOCUMENT_ROOT'] . "/php/connect.php"); //connects to wcss_pal database

$teacher_security_valid = 1; //teacher has access to the class

try {
	$security_result = $pdo -> query ("SELECT class_id FROM class WHERE teach_id = $_SESSION[user_id] AND class_id = $class_id");
	$row_count = $security_result -> rowCount();
	if ($row_count == 0) {
		$teacher_security_valid = 0; //tells that teacher has no privelege to access to the class
	}
}
catch(PDOException $e) {
	$teacher_security_valid = 0; //tells that teacher has no privelege to access to the class
}
?>