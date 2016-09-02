<?php
/*****************************************************************
Purpose: Checks if the teacher has any classes in the default year
******************************************************************/
include ($_SERVER['DOCUMENT_ROOT'] . "/php/connect.php"); //connects to wcss_pal database

$class_teacher_valid = 1; //teacher has registed class in the default year

try {
	$class_result = $pdo -> query ("SELECT class.class_id FROM class INNER JOIN year ON class.year_id = year.year_id
								    WHERE class.teach_id = $id AND year.default = 1");
	$row_count = $class_result -> rowCount();
	if ($row_count == 0) {
		$class_teacher_valid = 0; //tells that teacher has no classes in default year
	}
}
catch(PDOException $e) {
	$class_teacher_valid = 0; //tells that teacher has no classes in default year
}
?>