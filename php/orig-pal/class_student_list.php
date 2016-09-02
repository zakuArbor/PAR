<?php
/*
Purpose: To gather all student_id in a class
*/
$sql = "SELECT students.student_id FROM students INNER JOIN student_progress ON student_progress.student_id = students.student_id
		INNER JOIN class ON class.class_id = student_progress.class_id
	    WHERE class.class_id = $class_id ORDER BY students.last";

include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL query   
while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
  $students[] = $item['student_id'];
}
?>