<?php
//SQL below is to find out if the class already currently exists
function class_check ($block, $year_start,$course_code, $sem, $staff_no) { 
	////echo "<h1>TEST</h1>";
	$sql = "SELECT class.class_id FROM class
				INNER JOIN courses ON courses.course_id = class.course_id
				INNER JOIN year ON year.year_id = class.year_id
				WHERE class.period = $block AND year_start = $year_start 
				AND courses.course_code = '$course_code' AND year.sem = $sem AND class.teach_id = $staff_no";
	////echo "<p><h1>$sql</h1></p>";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');		
	////echo "<h2>$count_affected</h2>";
	return $count_affected;
}


function student_check ($oen, $last, $year_start, $course_code) {
	$sql = "SET SQL_BIG_SELECTS =1;
			SELECT student_progress.progress_id FROM student_progress 
			INNER JOIN students ON students.student_id = student_progress.student_id
			INNER JOIN class ON class.class_id = student_progress.class_id 
			INNER JOIN courses ON courses.course_id = class.course_id 
			INNER JOIN year ON class.year_id = year.year_id 
			INNER JOIN student_info ON students.student_id = student_info.student_id
			WHERE student_info.stud_num = '$oen' AND students.last = '$last' AND year.year_start = $year_start 
			AND courses.course_code = '$course_code'";
	echo $sql;
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
	return $count_affected;
}

function student_info ($oen) { 
	$sql = "SELECT students.student_id FROM students INNER JOIN student_info ON student_info.student_id = students.student_id
		WHERE student_info.stud_num = $oen";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');		
	$stud_id = $results -> fetch(PDO::FETCH_ASSOC);
	return $stud_id;
}

function year_info ($course_code, $year_start) {
	$sql = "SELECT class.class_id, year.year_id, year.sem FROM class 
			INNER JOIN year ON year.year_id = class.year_id INNER JOIN courses ON courses.course_id = class.course_id
			WHERE courses.course_code = '$course_code' AND year.year_start = $year_start";
	//echo "<p>$sql</p>";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
	$year_info = $results -> fetch(PDO::FETCH_ASSOC);
}

function insert ($year_info, $stud_id) {
	$sql = "SELECT MAX(progress_id) FROM student_progress";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
	$progress_id_temp = $results -> fetch(PDO::FETCH_ASSOC);
	$progress_id = $progress_id_temp['MAX(progress_id)'] + 1;
	$sql = "INSERT INTO student_progress (class_id, student_id, progress_id, grade, year_id, sem) 
			VALUES ($year_info[class_id], $stud_id[student_id], $progress_id, '',$year_info[year_id], $year_info[sem])";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
	//echo "<p><h1>$sql</h1></p>";
	$sql = "SELECT MAX(Scomment_id) FROM progress_report";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
	$Scomment_id_temp = $results -> fetch(PDO::FETCH_ASSOC);
	$Scomment_id = $Scomment_id_temp['MAX(Scomment_id)'] + 1; 
	$sql = "INSERT INTO progress_report (progress_id, level_id, interview_request, Scomment_id) VALUES ($progress_id, 1, 0, $Scomment_id)";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
	//echo "<p><b>$sql</b></p>";
}
?>