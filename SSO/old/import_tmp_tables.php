<?php
echo "<p>INTIALIZING TABLE CREATION</p>";
/*class csv analyze sequence******************************************/
$file = fopen("uploads/$class_file","r"); //reads csv files
while(!feof($file)) {
	$class_line[] = fgetcsv($file, 1024);
}
fclose($file);
if (strlen($class_line[1][0]) == 8 && strlen($class_line[1][1]) <= 16 && strlen($class_line[1][2]) <= 8 && strlen($class_line[1][3]) <= 70 
	&& strlen($class_line[1][4]) <= 70 && strlen($class_line[1][5]) <= 8 && strlen($class_line[1][6]) <= 8 && strlen($class_line[1][7]) <= 8 
	&& strlen($class_line[1][8]) <= 83 && strlen($class_line[1][9]) == 1 && strlen($class_line[1][10]) <= 12 && strlen($class_line[1][11]) <= 80 
	&& strlen($class_line[1][12]) <= 4) {
	echo "works";
}
else {
	echo "<p>ERROR: The data sequence for class does not match</p>";
	exit();
}
/****************************************************************/


/*teacher csv analyze sequence***************************************/
$file = fopen("uploads/$teacher_file","r"); //reads csv files
while(!feof($file)) {
	$teacher_line[] = fgetcsv($file, 1024);
}
fclose($file);
if (strlen($teacher_line[1][0]) <= 16 && strlen($teacher_line[1][1]) <= 20 && strlen($teacher_line[1][2]) <= 6 && strlen($teacher_line[1][3]) <= 16 
	&& strlen($teacher_line[1][4]) == 8 && strlen($teacher_line[1][5]) <= 70) {
	echo "works2";
}
else {
	echo "<p>ERROR: The data sequence for teacher does not match</p>";
	exit();
}

/*students csv analyze sequence**************************************/
$file = fopen("uploads/$student_file","r"); //reads csv files
while(!feof($file)) {
	$student_line[] = fgetcsv($file, 1024);
}
fclose($file);
if (strlen($student_line[1][0]) <= 70 && strlen($student_line[1][1]) == 8 && strlen($student_line[1][2]) <= 9 && strlen($student_line[1][3]) <= 12 
	&& strlen($student_line[1][4]) <= 12 && strlen($student_line[1][5]) <= 9 && strlen($student_line[1][6]) <= 19 && strlen($student_line[1][6]) > 8 && strlen($student_line[1][7]) <= 16) {
	echo "works3";
}
else {
	echo "<p>ERROR: The data sequence for students does not match</p>";
	exit();
}
/********************************************************************/

/*EMPTY ALL DATA FROM THE TEMP TABLES********************************/
$sql = "TRUNCATE TABLE temp_classes"; 
include ($_SERVER['DOCUMENT_ROOT']."/SSO/sso-sql.php"); 
$sql = "TRUNCATE TABLE temp_teachers";
include ($_SERVER['DOCUMENT_ROOT']."/SSO/sso-sql.php"); 
$sql = "TRUNCATE TABLE temp_students";
include ($_SERVER['DOCUMENT_ROOT']."/SSO/sso-sql.php");
/********************************************************************/

$skip = 0; //indicates when to skip a line because base on the csv sample files recieved, the 1st line contains the header of the table, which is undersired

$sql = "INSERT INTO temp_students (school_name, school_year, studentNo, first_name, last_name, oen_number, end_date, class_code) VALUES ";
foreach ($student_line as $item){ 
	if ($skip != 0) { 
		if (!empty($item[3])) { 
			$sql .= "('$item[0]', '$item[1]', '$item[2]', '$item[3]', '$item[4]', '$item[5]', '$item[6]', '$item[7]'),";
		}
	}
	$skip++;
}
$sql = substr_replace($sql, "", -1); //takes away the last character ',' from $sql  
include ($_SERVER['DOCUMENT_ROOT'].'/SSO/sql-import.php'); 
if ($count_affected > 0) {
	echo "<p>$count_affected rows for student information has been submitted to the database and shall be processed soon</p>";
}

$skip = 0;
$sql = "INSERT INTO temp_teachers (legal_first_name, legal_surname, staff_no, class_code, school_year, school_name) VALUES";
foreach ($teacher_line as $item){
	if ($skip != 0) {	 
		if (!empty($item[0])) { 
			$sql .= "('$item[0]', '$item[1]', '$item[2]', '$item[3]', '$item[4]', '$item[5]'),";
		}
	}
	$skip++;
}
$sql = substr_replace($sql, "", -1); //takes away the last character ',' from $sql  
//echo "<p>$sql</p>";
include ($_SERVER['DOCUMENT_ROOT'].'/SSO/sql-import.php'); 
if ($count_affected > 0) {
	echo "<p>$count_affected rows for teacher information has been submitted to the database and shall be processed soon</p>";
}
$skip = 0;
$sql = "INSERT INTO temp_classes (school_year, class_code, room_no, class_full_name, school_name, semester, term, block, reporting_teacher, teacher_gender, 
				course_code, course_title, course_grade) VALUES";
foreach ($class_line as $item){ 
	if ($skip != 0) {
		if (!empty($item[0])) { 
			$sql .= "('$item[0]', '$item[1]', '$item[2]', '$item[3]', '$item[4]', '$item[5]', '$item[6]', '$item[7]', '$item[8]', '$item[9]', '$item[10]'," 
					 . "'" . str_replace("'",' 	&rsquo;',$item[11]) . "', '$item[12]'),";
		}
	}
	$skip++;
}
$sql = substr_replace($sql, "", -1); //takes away the last character ',' from $sql  
//echo "<p>$sql</p>";
include ($_SERVER['DOCUMENT_ROOT'].'/SSO/sql-import.php'); 
if ($count_affected > 0) {
	echo "<p>$count_affected rows for class information has been submitted to the database and shall be processed soon</p>";
}
header ('Location: process_import.php');
//add javascript time thing
//header(Location: ''); //directs users to the processing page
?>

