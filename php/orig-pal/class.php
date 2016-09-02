<?php
//Purpose: Displays all the classes that the teacher teaches

$id = $_SESSION['user_id']; //user id retrieved from a session variable

include($_SERVER["DOCUMENT_ROOT"]."/php/check-teacher_class.php"); //checks if teacher has any registered classes for the default time

if ($class_teacher_valid == 1) {
	$sql= "SELECT courses.course_code, class.course_id, class.class_id,
		  users.first_name, users.last_name
	      FROM class INNER JOIN users ON class.teach_id = users.id
	      INNER JOIN courses ON courses.course_id = class.course_id
	      INNER JOIN year ON year.year_id = class.year_id
	      WHERE class.teach_id = $id AND year.default = 1 ORDER BY class.period";
	echo "";
	include($_SERVER["DOCUMENT_ROOT"]."/php/pal-sql.php"); //runs sql query and connection to PAL Db
	foreach ($results as $item) {
		$info[] = array('first_name' => $item['first_name'], 'last_name' => $item['last_name'], 'class' => $item['course_code'], 'class_id' => $item['class_id']);
	}
}

?>