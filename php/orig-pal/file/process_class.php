<?php
/*Add class to the database********************************************/
$sql = "SELECT school_year, class_code, semester, block, reporting_teacher, course_title FROM temp_classes"; //retrieve class information to import
include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php'); 
while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
	$class_process_import[] = array('year' => $item['school_year'], 'course_code' => $item['class_code'], 'course_name' => $item['course_title'],
									'sem' => $item['semester'], 'block' => $item['block'], 'teacher' => $item['reporting_teacher']);
}
$count_affected = 0; 
include "functions.php";

foreach ($class_process_import as $import) {
	$year_start = substr($import['year'], 0, 4);
	$year_end = substr($import['year'], 4, 8);
	//$import_name = explode(', ', $import['teacher'], 2);
	list($last_import, $first_import) = explode(', ', $import['teacher'], 2);
	//print_r($import_name);
	if ($import['block'] == 'A') {
		$block = 1;
	}
	else if ($import['block'] == 'B') {
		$block = 2;
	}
	else if ($import['block'] == 'C') {
		$block = 3;
	}
	else if ($import['block'] == 'D') {
		$block = 4;
	}
	//sql is trying to retrieve the staff_no from temp_teachers to link as wcss_sso.users.id
	$sql = "SELECT temp_teachers.staff_no FROM temp_teachers WHERE temp_teachers.legal_first_name LIKE '%$first_import%' AND 
	        temp_teachers.legal_surname LIKE '%$last_import%' AND temp_teachers.class_code = '$import[course_code]'";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');
	//echo "<p>$sql</p>"; 
	$staff_no = $results -> fetch(PDO::FETCH_ASSOC);    
	//print_r($staff_no);exit();  
	if ($count_affected != 0) { 
		$count_affected = class_check($block, $year_start, $import['course_code'], $import['sem'], $staff_no['staff_no']);
		if ($count_affected == 0) { 
			$sql = "SELECT year.year_id FROM year WHERE year.year_start = $year_start AND year.year_end = $year_end AND year.sem = $import[sem]";
			include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');		
			$import_year_class = $results -> fetch(PDO::FETCH_ASSOC);
			$sql = "SELECT course_id FROM courses WHERE courses.course_code = '$import[course_code]' AND courses.course_name = '$import[course_name]'";
			include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');
			$import_course_class = $results -> fetch(PDO::FETCH_ASSOC);
			//echo "<p>$sql<p>";
			//echo "<p><h3>course_id: $import_course_class[course_id]</h3><p>";
			if (!empty($import_course_class['course_id']) && $import_course_class['course_id'] != 0 && $count_affected != 0) { 
				$sql = "INSERT INTO class (teach_id, course_id, year_id, period) 
						VALUES ('$staff_no[staff_no]', '$import_course_class[course_id]', '$import_year_class[year_id]', '$block')";
				//echo "<p><h3>$sql</h3></p>";
				include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
			}
		}
	}
	else {//this is just to counter measure the incorrect last name
		$sql = "SELECT temp_teachers.staff_no FROM temp_teachers 
				WHERE temp_teachers.legal_surname LIKE '%$last_import%' AND temp_teachers.class_code = '$import[course_code]'";
		include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');
		$staff_no = $results -> fetch(PDO::FETCH_ASSOC);    
		if ($count_affected != 0) {
			$sql = "SELECT class.class_id FROM class
					INNER JOIN courses ON courses.course_id = class.course_id
					INNER JOIN year ON year.year_id = class.year_id
					WHERE class.period = $block AND year_start = $year_start 
					AND courses.course_code = '$import[course_code]' AND year.sem = $import[sem] AND class.teach_id = $staff_no[staff_no]";
			//echo "<p><br><br><h1>TTEESSSST$sql</h1></p>";
			include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');		
			if ($count_affected == 0) { 
				$sql = "SELECT year_id FROM year WHERE year_start = $year_start AND year_end = $year_end AND sem = $import[sem]";
				include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');		
				$import_year_class = $results -> fetch(PDO::FETCH_ASSOC);
				$sql = "SELECT course_id FROM courses WHERE courses.course_code = '$import[course_code]' AND courses.course_name = '$import[course_name]'";
				include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');
				if (!empty($import_course_class['course_id']) && $import_course_class['course_id'] != 0 && $count_affected != 0) { 
					$import_course_class = $results -> fetch(PDO::FETCH_ASSOC);
					$sql = "INSERT INTO class (teach_id, course_id, year_id, period) 
							VALUES ('$staff_no[staff_no]', '$import_course_class[course_id]', '$import_year_class[year_id]', '$block')";
					//echo "<p><h3>$sql</h3></p>";
					include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
				}
			}
		}
	}
	$count_affected = 0;
}

/*************************************************************************/
//echo "END";
header ('Location: process_student.php');
?>