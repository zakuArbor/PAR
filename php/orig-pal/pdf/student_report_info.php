<?php
$sql = "SELECT courses.course_code, courses.course_name,student_info.stud_num, students.first, students.last,progress_report.level_id, 
		progress_report.Scomment_id, student_progress.progress_id, level.level, progress_report.interview_request
		FROM students INNER JOIN student_info ON students.student_id = student_info.student_id
		INNER JOIN student_progress ON student_progress.student_id = students.student_id
		INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id
		INNER JOIN class ON class.class_id = student_progress.class_id 
		INNER JOIN courses ON courses.course_id = class.course_id
		INNER JOIN level ON level.level_id = progress_report.level_id
		WHERE class.class_id = $class_id 
		AND students.student_id = $stud_id";

include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL command query
$info = $results -> fetch(PDO::FETCH_ASSOC);

include ($_SERVER['DOCUMENT_ROOT'] . "/php/check_student-comments.php"); //gathers all existing comments for the student
    
if ($comments_valid == 1) { //if there are any existing comments
	foreach ($comments_result as $item) {
		$comments[] = array('comment_id' => $item['comment_id'], 'comment' => $item['comment']);
	}
}
?>