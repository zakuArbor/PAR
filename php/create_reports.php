<?php
$sql = "SELECT student_id FROM student_progress where class_id = :class_id;";
$students_id = array_prepare_select ($sql, $pdo, ['class_id' => $class_id]);

foreach ($students_id as $student_id) {
	#check if a progress_id exists in progress_report
	#check if an existing report card already exists for this course
	$sql = "SELECT progress_report.progress_id FROM progress_report 
			INNER JOIN student_progress ON  student_progress.progress_id = progress_report.progress_id
			WHERE student_progress.student_id = :student_id AND student_progress.class_id = :class_id";
	$variables = array(':student_id' => $student_id['student_id'], ':class_id' => $class_id);
	$results = single_return_prepare_select($sql, $pdo, $variables);             

	if (!is_array($results)) {
		echo "create";
		$sql = "SELECT progress_id FROM student_progress WHERE student_id = :student_id AND class_id = :class_id;";
		$variables = array('student_id' => $student_id['student_id'], 'class_id' => $class_id);
		$progress_id = single_return_prepare_select($sql, $pdo, $variables);
		#LEVEL_ID = 1: INCOMPLETE
		#INSERT PROGRESS_REPORT######################################################################################
		$sql = "INSERT INTO progress_report VALUES (:progress_id, 1, 0);";
		$variables = array(':progress_id' => $progress_id['progress_id']);
		$results = prepare_non_query($sql, $pdo, $variables);
		#############################################################################################################
	}
}
?>