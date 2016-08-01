<?php
	$teach_id = 1;
	$sql = "SELECT courses.course_code, class.class_id FROM courses 
		INNER JOIN class ON class.course_id = courses.course_id  
		WHERE class.staff_id = $teach_id";

	include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/paR-sql.php");
	foreach ($results as $result) {
		echo "<p><a href =student_class_list.php?id=$result[class_id]>" . $result['course_code'] . "</a></p>";
	}
?>