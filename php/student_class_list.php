<?php
	$sql = "SELECT students.first_name, students.last_name, students.student_id, progress_report.level_id FROM students 
		INNER JOIN student_progress ON students.student_id = student_progress.student_id 
		INNER JOIN class ON class.class_id = student_progress.class_id 
		INNER JOIN progress_report ON student_progress.progress_id = progress_report.progress_id
		WHERE class.staff_id = :teach_id 
		AND student_progress.class_id = :class_id
		ORDER BY students.last_name";
	$variables = array(':teach_id' => $_SESSION['id'], ':class_id' => $class_id);

	$students = array_prepare_select($sql, $pdo, $variables);
	

/*
	foreach ($results as $result) {
		echo "<p><a href = student.php?id=$result[student_id]&class=$class_id>" . $result['last_name'] . ", ". $result['first_name'] . "</a></p>";
	}
*/
?>