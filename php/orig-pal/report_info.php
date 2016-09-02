<?php
//Purpose: Gather all related information for a student's progress report card for a specific class

include ($_SERVER['DOCUMENT_ROOT'] . "/php/check_progress-report.php"); //checks if user has any existing progress report for the class

if ($report_valid == 1) { 
	$sql = "SELECT courses.course_code, courses.course_name,student_info.stud_num, students.first, students.last,progress_report.level_id, progress_report.Scomment_id, student_progress.progress_id, level.level, progress_report.interview_request
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
}
else {
	/*usage for student_report.php: If student in the registered class does not have an existing progress_report information in the table progress_report,
	                                then a row with default student report card information will be created (i.e. progress level would be 'Incomplete')*/
	$sql = "SELECT progress_id FROM student_progress WHERE student_id = $stud_id AND class_id = $class_id"; //fetches the student's progress_id 
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL command query
	$report_info = $results -> fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT MAX(Scomment_id) FROM progress_report"; 
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //runs SQL command 
	$maxId = $results -> fetch(PDO::FETCH_ASSOC);
	
	$Scomment_id = $maxId['MAX(Scomment_id)'] + 1; //creates a new Scomment_id for the student (needed to create a new entry in the table progress_report)

	$sql = "INSERT INTO progress_report VALUES ('$report_info[progress_id]', 1, 0 , '$Scomment_id')";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php"); //runs SQL command 
	$sql = "INSERT INTO student_comments VALUES ('', '$Scomment_id', '')";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php"); //runs SQL command 
	header("Location: /student_report.php?stud_id=$stud_id&class=$class_id"); //reloads the page so that the page will load the registered student's new report card information from the table report_student which had not existed before
}
?>