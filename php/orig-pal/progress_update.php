<?php

setcookie("submit","Submit Successful",time() + 3, "/");

if (empty($_POST['level'])) {
		echo "<p>There is no input</p>";
		exit();
}
else {
	$level = $_POST['level'];
	$progress_id = $_POST['progress_id'];
	$Scomment_id = $_POST['Scomment_id'];
	$class_id = $_POST['class_id'];
	$interview = $_POST['interview'];
	//when admin adds a new class for a student, the student has automatically recieves a progress_id from the table `progress_report`
	$sql = "UPDATE progress_report SET level_id = '$level', interview_request = $interview WHERE progress_id = $progress_id";	
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
	echo $sql;

	
	$counter = 0;
	$terminate = 1; //tells when to terminate the loop
	$teller = 1;
	$stud = $_POST['student_id'];
	$item = $_POST['comment_id'];

	$sql = "DELETE FROM student_comments WHERE Scomment_id = $Scomment_id";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
	echo "<p> $sql </p>";
	while ($terminate != 0) {
		if ($counter > 6) {
			$teller = 0;
			$terminate = 0;
		}
		else if (!empty($item[$counter])) {
			$sql = "INSERT INTO student_comments (Scomment_id, comment_id) VALUES ($Scomment_id, $item[$counter])";
			echo "<p>$sql</p>";
			include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
			echo "<p>$counter</p>";
		}
		$counter++;
	}
}
include ($_SERVER['DOCUMENT_ROOT'] . "/php/class_student_list.php");
if ($students[$count_affected-1] != $stud) { 
	for ($i = 0; $i < $count_affected; $i++) {
		if ($students[$i] == $stud) {
			$next_student = $i + 1;
			$i = 999;
		}
	}
header("Location: /student_report.php?stud_id=$students[$next_student]&class=$class_id");				
}
else { 
	$sql = "SELECT course_name FROM courses INNER JOIN class ON courses.course_id = class.course_id WHERE class.class_id = $class_id";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");
	$class = $results -> fetch(PDO::FETCH_ASSOC);
	header("Location: /class_students.php?class_id=$class_id&class=$class[course_name]");
}



	/*while ($terminate != 0) {
		if ($counter > 6) {
			$teller = 0;
			$terminate = 0;
		}
		else if (!empty($item) && !empty($item[$counter])) { 
			$sql = "INSERT INTO student_comments (Scomment_id, comment_id) VALUES ($Scomment_id, $item[$counter])";
			echo "<p>$sql</p>";
			include ($_SERVER['DOCUMENT_ROOT'] . "/PAL/php/pal-non_query-sql.php");
			echo "<p>$counter</p>";
			
		}
		else {
			$terminate = 0;
			include ($_SERVER['DOCUMENT_ROOT'] . "/PAL/php/class_student_list.php");
			if ($students[$count_affected-1] != $stud) { 
				for ($i = 0; $i < $count_affected; $i++) {
					if ($students[$i] == $stud) {
						$next_student = $i + 1;
						$i = 999;
					}
				}
				//header("Location: http://dev.emmell.org/PAL/student_report.php?stud_id=$students[$next_student]&class=$class_id");
				
			}
			else { 
				$sql = "SELECT course_name FROM courses INNER JOIN class ON courses.course_id = class.course_id WHERE class.class_id = $class_id";
				include ($_SERVER['DOCUMENT_ROOT'] . "/PAL/php/pal-sql.php");
				$class = $results -> fetch(PDO::FETCH_ASSOC);
				//header("Location:http://dev.emmell.org/PAL/class_students.php?class_id=$class_id&class=$class[course_name]");
			}
		}*/
		//$counter++;

	//}
//}

/*
echo "erterer";
echo "<script language='javascript' type='text/javascript'>";
echo "setInterval(function () { window.location = 'http://dev.emmell.org/PAL/class_students.php'; }, 100);
   	  </script>";*/
?>