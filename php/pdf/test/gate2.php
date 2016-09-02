<?php
//include ($_SERVER['DOCUMENT_ROOT'] . "/PAL/php/student_report_cards.php"); //GATHERS ALL THE STUDENT'S CLASS ID
$sql = "SELECT staff.staff_first, staff.staff_last, courses.course_code, courses.course_title,
		progress_level.level, progress_report.progress_id, progress_report.interview_request FROM staff 
        INNER JOIN class ON class.staff_id = staff.staff_id
        INNER JOIN student_progress ON student_progress.class_id = class.class_id
        INNER JOIN progress_report ON progress_report.progress_id = student_progress.progress_id
        INNER JOIN courses ON courses.course_id = class.course_id
        INNER JOIN progress_level ON progress_level.level_id = progress_report.level_id
        WHERE student_progress.student_id = :student_id ORDER BY class.period";
#echo $sql;
#kill();
$results = array_prepare_select ($sql, $pdo, ['student_id' => $item['student_id']]);
foreach ($results as $item) {
        $course_info[] = array('teach_first' => $item['staff_first'], 'teach_last' => $item['staff_last'], 'course_code' => $item['course_code'], 
						 'course_name' => $item['course_name'], 'progress_id' => $item['progress_id'],  'level' => $item['level'], 
						 'interview_request' => $item['interview_request']);
}
//print_r ($course_info);
$class_counter = $count_affected;


?>