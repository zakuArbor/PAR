<?php
/*******************************************************************************************
Purpose: Checks if the student has any registered class
*******************************************************************************************/
include ($_SERVER['DOCUMENT_ROOT'] . "/php/connect.php"); //connects to wcss_pal database

$class_valid = 1; //student has registed class 

try {
	$class_result = $pdo -> query ("SELECT class_id FROM student_progress WHERE student_id = $stud_id");
	$row_count = $class_result -> rowCount();
	if ($row_count == 0) {
		$class_valid = 0; //tells that student does not have any registered classes
	}
}
catch(PDOException $e) {
	$class_valid = 0; //tells that student does not have any registered classes
}
?>