<?php
/*****************************************************************************************
Purpose: Checks if the student has any existing progress reprot card for a specific class
*****************************************************************************************/

include ($_SERVER['DOCUMENT_ROOT'] . "/php/connect.php"); //connects to wcss_pal database

$report_valid = 1; //student has existing progress report for the class 

try {
	$report_result = $pdo -> query ("SELECT * FROM progress_report INNER JOIN student_progress ON student_progress.progress_id = progress_report.progress_id
	                                 WHERE student_progress.student_id = $stud_id AND student_progress.class_id = $class_id");
	$row_count = $report_result -> rowCount();
	if ($row_count == 0) {
		$report_valid = 0; //tells that student does not have any existing progress report
	}
}
catch(PDOException $e) {
	$report_valid = 0; //tells that student does not have any existing progress report
}
?>