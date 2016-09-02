<?php
//include ($_SERVER['DOCUMENT_ROOT'] . "/PAL/php/student_report_cards.php"); //GATHERS ALL THE STUDENT'S CLASS ID
$sql = "SELECT users.first_name, users.last_name, courses.course_code, courses.course_name,
		progress_report.Scomment_id, level.level, progress_report.interview_request FROM users 
        INNER JOIN class ON class.teach_id = users.id
        INNER JOIN student_progress ON student_progress.class_id = class.class_id
        INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id
        INNER JOIN courses ON courses.course_id = class.course_id
        INNER JOIN level ON level.level_id = progress_report.level_id
        WHERE student_progress.student_id = $item[student_id] ORDER BY class.period";
#echo $sql;
#kill();
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL command query
foreach ($results as $item) {
	$course_info[] = array('teach_first' => $item['first_name'], 'teach_last' => $item['last_name'], 'course_code' => $item['course_code'], 
						 'course_name' => $item['course_name'], 'Scomment_id' => $item['Scomment_id'],  'level' => $item['level'], 
						 'interview_request' => $item['interview_request']);
}
//print_r ($course_info);
$class_counter = $count_affected;


?>