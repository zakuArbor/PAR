<?php
/*Writing CSV Export File For wcss_par.students ************************************************/
$sql = "SELECT * FROM students";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-students.csv","w+");

fwrite ($file, "student_id, last_name, first_name, middle_name, grade\n");
foreach ($student as $line) {
	fwrite($file, ($line['student_id'] . "," . $line['first_name'] . "," . $line['last_name'] . "," . $line['middle_name'] . "," . $line['grade'] . "\n"));
}
fclose($file);
/**********************************************************************************************/
/*Writing CSV Export File For wcss_par.student_info ************************************************/
$sql = "SELECT * FROM student_info";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-student_info.csv","w+");

fwrite ($file, "studentI_id, student_id, OEN, address\n");
foreach ($student as $line) {
	fwrite($file, ($line['studentI_id'] . "," . $line['student_id'] . "," . $line['OEN'] . $line['address'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_par.course******* ************************************************/
$sql = "SELECT * FROM courses";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-courses.csv","w+");

fwrite ($file, "course_id, course_code, course_title, course_desc\n");
foreach ($student as $line) {
	fwrite($file, ($line['course_id'] . "," . $line['course_code'] . "," . $line['course_title'] . $line['course_desc'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_par.comments *****************************************************/
$sql = "SELECT * FROM comment_list";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-comments.csv","w+");

fwrite ($file, "comment_id, comment\n");
foreach ($student as $line) {
	fwrite($file, ($line['comment_id'] . "," . $line['comment'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_par.year *********************************************************/
$sql = "SELECT * FROM year";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-year.csv","w+");

fwrite ($file, "year_id, year_start, year_end, sem, year_default\n");
foreach ($student as $line) {
	fwrite($file, ($line['year_id'] . "," . $line['year_start'] . "," . $line['year_end'] . "," . $line['sem'] . "," . $line['year_default'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_par.class *********************************************************/
$sql = "SELECT * FROM class";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-class.csv","w+");

fwrite ($file, "class_id, staff_id, course_id, year_id, period\n");
foreach ($student as $line) {
	fwrite($file, ($line['class_id'] . "," . $line['staff_id'] . "," . $line['course_id'] . "," . $line['year_id'] . "," . $line['period'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_par.student_progress *********************************************/
$sql = "SELECT * FROM student_progress";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-student_progress.csv","w+");

fwrite ($file, "sProgress_id, progress_id, student_id, class_id, year_id\n");
foreach ($student as $line) {
	fwrite($file, ($line['sProgress_id'] . "," . $line['progress_id'] . ",".  $line['student_id'] . "," . $line['class_id'] . ","  . $line['year_id'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_par.progress_report **********************************************/
$sql = "SELECT * FROM progress_report";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-progress_report.csv","w+");

fwrite ($file, "progress_id, level_id, interview_request\n");
foreach ($student as $line) {
	fwrite($file, ($line['progress_id'] . "," . $line['level_id'] . "," . $line['interview_request'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_par.level ********************************************************/
$sql = "SELECT * FROM progress_level";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-level.csv","w+");

fwrite ($file, "level_id, level\n");
foreach ($student as $line) {
	fwrite($file, ($line['level_id'] . "," . $line['level'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_par.student_comments *********************************************/
$sql = "SELECT * FROM progress_comment";
$student = array_prepare_select ($sql, $pdo, []);

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . "par-student_comments.csv","w+");

fwrite ($file, "pComment_id, progress_id, comment_id\n");
foreach ($student as $line) {
	fwrite($file, ($line['pComment_id'] . "," . $line['progress_id'] . "," . $line['comment_id'] . "\n"));
}
fclose($file);
/****************************************************************************************************/

/*Compressing par tables*******************/
$zip = new ZipArchive();
$zip->open($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-tables.zip', ZipArchive::CREATE);

$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-students.csv', 'par-students.csv');
//echo file_exists ("par-students.csv");
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-student_info.csv', 'par-student_info.csv');
//echo file_exists ("par-student_info.csv");
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-courses.csv', 'par-courses.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-comments.csv', 'par-comments.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-year.csv', 'par-year.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-class.csv', 'par-class.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-student_progress.csv', 'par-student_progress.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-progress_report.csv', 'par-progress_report.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-level.csv', 'par-level.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/export/" . 'par-student_comments.csv', 'par-student_comments.csv');

$zip->close();
/*******************/
?>	
