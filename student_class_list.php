<?php
	$teach_id = 1; #replace with session

	$class_id = $_GET['id'];
	$sql = "SELECT students.first_name, students.last_name, students.student_id FROM students 
		INNER JOIN student_progress ON students.student_id = student_progress.student_id 
		INNER JOIN class ON class.class_id = student_progress.class_id 
		WHERE class.staff_id = $teach_id 
		AND student_progress.class_id = $class_id";
	include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/par-sql.php");
	foreach ($results as $result) {
		echo "<p><a href = student.php?id=$result[student_id]&class=$class_id>" . $result['last_name'] . ", ". $result['first_name'] . "</a></p>";
	}
?>