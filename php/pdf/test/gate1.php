<?php
//$class_id = $_POST['class_id'];
$sql = "SELECT student_info.OEN, students.first_name, students.last_name, students.student_id FROM students 
		INNER JOIN student_info ON students.student_id = student_info.student_id 
		INNER JOIN student_progress ON student_progress.student_id = students.student_id
		WHERE student_progress.class_id = :class_id";
$results = array_prepare_select ($sql, $pdo, ['class_id' => $class_id]);
foreach ($results as $item) {
	$student[] = array('OEN' => $item['OEN'], 'first' => $item['first_name'], 'last' => $item['last_name'], 'student_id' => $item['student_id']);
}

//print_r ($student);

?>