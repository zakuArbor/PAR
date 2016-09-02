<?php
$sql = "SELECT students.first_name, students.last_name, students.student_id FROM students 
			INNER JOIN student_progress ON students.student_id = student_progress.student_id 
			INNER JOIN class ON class.class_id = student_progress.class_id 
			WHERE class.staff_id = :teach_id 
			AND student_progress.class_id = :class_id
			ORDER BY students.last_name";
$variables = array(':teach_id' => $_SESSION['id'], ':class_id' => $class_id);
$students = array_prepare_select($sql, $pdo, $variables);
?>
