<?php


$teach_id = 1;

$student_id = $_GET['student_id'];
$class_id = $_GET['class'];



include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/progress_functions.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/prepare_sql.php");


#retrieves student info##########################################################################################
$sql = "SELECT students.first_name, students.last_name, student_info.OEN FROM students 
		INNER JOIN student_info ON student_info.student_id = students.student_id
		WHERE students.student_id = $student_id";
$results = single_return_prepare_select($sql, $pdo);
#################################################################################################################


echo "<p>$results[last_name], $results[first_name]</p>";


#check if a progress_id exists in progress_report
#check if an existing report card already exists for this course
$sql = "SELECT progress_report.progress_id FROM progress_report 
		INNER JOIN student_progress ON  student_progress.progress_id = progress_report.progress_id
		WHERE student_progress.student_id = $student_id AND student_progress.class_id = $class_id";

$results = single_return_prepare_select($sql, $pdo);

if (!is_array($results)) {
	$sql = "SELECT progress_id FROM student_progress WHERE student_id = $student_id AND class_id = $class_id;";
	$progress_id = single_return_prepare_select($sql, $pdo);
	#LEVEL_ID = 1: INCOMPLETE
	#INSERT PROGRESS_REPORT######################################################################################
	$sql = "INSERT INTO progress_report VALUES ($progress_id[progress_id], 1, 0);";
	$results = prepare_insert($sql, $pdo);
	#############################################################################################################
}
else {
	$progress_id = $results;
}

#retrieve current student level and interview request############################################################
$sql = "SELECT level_id, interview_request FROM progress_report WHERE progress_id = $progress_id[progress_id]";
$student_progress = single_return_prepare_select($sql, $pdo);
#################################################################################################################

#retrieve current student comments ##############################################################################
$sql = "SELECT comment_id FROM progress_comment WHERE progress_id = $progress_id[progress_id]";
$student_comments = array_prepare_select($sql, $pdo);
#################################################################################################################

echo "<form action = '/par/php/progress_report_update.php' method = 'POST'>";

#PRINT OUT LEVEL DROPLIST########################################################################################
form_level($student_progress['level_id'], $pdo);
#################################################################################################################

#PRINT OUT COMMENT LIST##########################################################################################
$comment_list = comment_display($student_comments, $pdo);
#################################################################################################################

#PARENT TEACHER INTERVIEW REQUEST################################################################################
echo "<p><b>PARENT-TEACHER INTERVIEW REQUEST</b></p>";
echo "<input type='radio' name='interview_request' value='1' ";
if ($student_progress['interview_request'] == 1) {
	echo "checked";
}
echo ">Yes<br>";
echo "<input type='radio' name='interview_request' value='0' ";
if ($student_progress['interview_request'] == 0) {
	echo "checked";
}
echo ">No<br>";
#################################################################################################################

#Hidden Input####################################################################################################
echo "<input type = 'hidden' name = 'progress_report' value = '$progress_id[progress_id]'>";
echo "<input  type = 'submit' value = 'SUBMIT'>";

$pdo = null;
?>