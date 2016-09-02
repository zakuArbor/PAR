<?php
//$class_id = $_POST['class_id'];
$sql = "SELECT student_info.stud_num, students.first, students.last, students.student_id FROM students 
		INNER JOIN student_info ON students.student_id = student_info.student_id 
		INNER JOIN student_progress ON student_progress.student_id = students.student_id
		WHERE student_progress.class_id = $class_id";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");
foreach ($results as $item) {
	$student[] = array('stud_num' => $item['stud_num'], 'first' => $item['first'], 'last' => $item['last'], 'student_id' => $item['student_id']);
}

//print_r ($student);

?>