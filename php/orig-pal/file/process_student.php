<?php
/*ADD STUDENT TO THE DATABASE AND REGISTER EACH STUDENT A PROGRESS REPORT CARD WITH DEFAULT VALUES*********************/

//ADD STUDENT INTO STUDENT LIST
$sql = "SELECT * FROM temp_students";
include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
	$students[] = array('oen' => $item['oen_number'], 'first' => $item['first_name'], 'last' => $item['last_name'], 'course_code' => $item['class_code'], 
						'year' => $item['school_year']);
}
foreach ($students as $student_import) {
	$count_affected = 1;
	$sql = "SELECT students.student_id FROM students INNER JOIN student_info ON students.student_id = student_info.student_id
			WHERE students.first = '$student_import[first]' AND students.last = '$student_import[last]' AND student_info.stud_num = $student_import[oen]";
	////echo "<p><b>$sql</b></p>";
	include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
	if ($count_affected == 0) {
		$sql = "SELECT MAX(student_id) FROM students";
		include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
		$stud_id_temp = $results-> fetch(PDO::FETCH_ASSOC); 
		$stud_id = $stud_id_temp['MAX(student_id)'] + 1;
		$sql = "INSERT INTO students (student_id, first, last) VALUES ($stud_id,'$student_import[first]', '$student_import[last]');";
		include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-non_query-sql.php');
		//echo "<p><b>$sql</b></p>";
		$sql = "INSERT INTO student_info (student_id, stud_num) VALUES ($stud_id, '$student_import[oen]') ";
		//echo "<p>$sql</p>"; 
		include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-non_query-sql.php');
	}
}
/**********************************************************************************************************************/
$stud_id = NULL;
header ('Location: process_student2.php');
?>