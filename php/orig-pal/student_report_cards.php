<?php
/*$sql = "SELECT students.first, students.last, courses.course_code, level.level, comments.comment 
		FROM students INNER JOIN student_progress ON students.student_id = student_progress.student_id
		INNER JOIN class ON class.class_id = student_progress.class_id
		INNER JOIN courses ON class.course_id = courses.course_id
		INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id
		INNER JOIN student_comments ON student_comments.Scomment_id = progress_report.Scomment_id
		INNER JOIN comments ON comments.comment_id = student_comments.comment_id
		INNER JOIN level ON level.level_id = progress_report.level_id
		WHERE students.student_id = $stud_id";*/
		$test_id = $stud_id;
include ($_SERVER['DOCUMENT_ROOT'] . "/php/check_classes.php");
if ($class_valid == 1) {
	$sql = "SELECT class_id FROM student_progress WHERE student_id = $stud_id"; 
	$class_counter = 0; //starting number of classes
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL query Command
	while ($row = $results -> fetch(PDO::FETCH_ASSOC)) {
		$classes[] = $row['class_id'];
		$class_num = $class_counter;
		$class_counter++;
	}
}


?>