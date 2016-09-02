<?php
	$sql = "SELECT courses.course_code, class.class_id FROM courses 
		INNER JOIN class ON class.course_id = courses.course_id  
		WHERE class.staff_id = :teach_id";

	$classes = array_prepare_select($sql, $pdo, ['teach_id' => $teach_id]);
?>