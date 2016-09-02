<?php
/*
Purpose: To process all data from the temp tables to its appropiate tables. Basically, it retrieves nessecary data
PROBLEM: ANY TEACHER THAT HAVE DIFFERENT LAST NAME BETWEEN RIDE AND MAMA WILL NOT BE IMPORTED INTO THE PAL DATABASE
*/
include($_SERVER['DOCUMENT_ROOT'].'/SSO/connect_sso.php'); //connects to sso database
/*Adds non-registered courses into the database*********************/
$sql = "SELECT temp_classes.class_code, temp_classes.course_title FROM temp_classes
		INNER JOIN temp_students ON temp_students.class_code = temp_classes.class_code
		WHERE temp_classes.reporting_teacher != 'NULL'"; 
		//THE SQL RETRIEVES class_code and class_title from temp_classes for classes that have reporting teachers and have students registered in the class
include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php'); 
while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
  $class_codes[] = array('course_code' => $item['class_code'], 'course_name' => $item['course_title']);
}

foreach ($class_codes as $class_code) { 
	$sql = "SELECT course_code, course_name FROM courses 
			WHERE courses.course_code = '$class_code[course_code]'";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php'); 
	//echo "<p>$sql</p>";
	$course = $results -> fetch(PDO::FETCH_ASSOC);
	if ($count_affected == 0) {
		$sql = "INSERT INTO courses (course_code, course_name) VALUES ('$class_code[course_code]', '$class_code[course_name]')";
		//echo "<p><h3>$sql</h3></p>";
		include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php'); 
	}
}
/********************************************************************/

echo "END 1";
header ('Location: process_year.php');
?>