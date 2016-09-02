<?php
/*Writing CSV Export File For wcss_pal.students ************************************************/
$sql = "SELECT * FROM students";


include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-students.csv","w+");

fwrite ($file, "student_id, last, first\n");
foreach ($student as $line) {
	fwrite($file, ($line['student_id'] . "," . $line['first'] . "," . $line['last'] . "\n"));
}
fclose($file);
/**********************************************************************************************/
/*Writing CSV Export File For wcss_pal.student_info ************************************************/
$sql = "SELECT * FROM student_info";


include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-student_info.csv","w+");

fwrite ($file, "id, student_id, stud_num\n");
foreach ($student as $line) {
	fwrite($file, ($line['id'] . "," . $line['student_id'] . "," . $line['stud_num'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_pal.course******* ************************************************/
$sql = "SELECT * FROM courses";


include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-courses.csv","w+");

fwrite ($file, "course_id, course_code, course_name\n");
foreach ($student as $line) {
	fwrite($file, ($line['course_id'] . "," . $line['course_code'] . "," . $line['course_name'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_pal.comments *****************************************************/
$sql = "SELECT * FROM comments";


include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-comments.csv","w+");

fwrite ($file, "comment_id, comment\n");
foreach ($student as $line) {
	fwrite($file, ($line['comment_id'] . "," . $line['comment'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_pal.year *********************************************************/
$sql = "SELECT * FROM year";

include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-year.csv","w+");

fwrite ($file, "year_id, year_start, year_end, sem, default\n");
foreach ($student as $line) {
	fwrite($file, ($line['year_id'] . "," . $line['year_start'] . "," . $line['year_end'] . "," . $line['sem'] . "," . $line['default'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_pal.class *********************************************************/
$sql = "SELECT * FROM class";

include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-class.csv","w+");

fwrite ($file, "class_id, teach_id, course_id, year_id, period\n");
foreach ($student as $line) {
	fwrite($file, ($line['class_id'] . "," . $line['teach_id'] . "," . $line['course_id'] . "," . $line['year_id'] . "," . $line['period'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_pal.student_progress *********************************************/
$sql = "SELECT * FROM student_progress";

include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-student_progress.csv","w+");

fwrite ($file, "id, class_id, progress_id, grade, year_id, sem\n");
foreach ($student as $line) {
	fwrite($file, ($line['id'] . "," . $line['class_id'] . "," . $line['progress_id'] . "," . $line['grade'] . "," . $line['year_id']
		   . "," . $line['sem'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_pal.progress_report **********************************************/
$sql = "SELECT * FROM progress_report";


include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-progress_report.csv","w+");

fwrite ($file, "progress_id, level_id, interview_request, Scomment_id\n");
foreach ($student as $line) {
	fwrite($file, ($line['progress_id'] . "," . $line['level_id'] . "," . $line['interview_request'] . "," . $line['Scomment_id'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_pal.level ********************************************************/
$sql = "SELECT * FROM level";


include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-level.csv","w+");

fwrite ($file, "level_id, level\n");
foreach ($student as $line) {
	fwrite($file, ($line['level_id'] . "," . $line['level'] . "\n"));
}
fclose($file);
/****************************************************************************************************/
/*Writing CSV Export File For wcss_pal.student_comments *********************************************/
$sql = "SELECT * FROM student_comments";

include $_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php";
$student = $results -> fetchAll();

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . "pal-student_comments.csv","w+");

fwrite ($file, "id, Scomment_id, comment_id\n");
foreach ($student as $line) {
	fwrite($file, ($line['id'] . "," . $line['Scomment_id'] . "," . $line['comment_id'] . "\n"));
}
fclose($file);
/****************************************************************************************************/

/*Compressing PAL tables*******************/
$zip = new ZipArchive();
$zip->open($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'wcss_pal-tables.zip', ZipArchive::CREATE);

$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-students.csv', 'pal-students.csv');
//echo file_exists ("pal-students.csv");
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-student_info.csv', 'pal-student_info.csv');
//echo file_exists ("pal-student_info.csv");
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-courses.csv', 'pal-courses.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-comments.csv', 'pal-comments.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-year.csv', 'pal-year.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-class.csv', 'pal-class.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-student_progress.csv', 'pal-student_progress.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-progress_report.csv', 'pal-progress_report.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-level.csv', 'pal-level.csv');
$zip->addFile($_SERVER['DOCUMENT_ROOT'] . "/php/file/export/" . 'pal-student_comments.csv', 'pal-student_comments.csv');

$zip->close();
/*******************/
?>	
