<?php
$teacher_file = $_FILES['file_teacher']['name'];
$class_file = $_FILES['file_class']['name'];
$student_file = $_FILES['file_student']['name'];

echo $_SERVER['DOCUMENT_ROOT'];

if (!empty($teacher_file) && !empty($class_file) && !empty($student_file)) { //to make sure there is a file submitted
	$ext_teacher = strtolower(substr($teacher_file, strpos($teacher_file, '.') + 1)); //lowercases the extension recieved from string position after the '.'
	$ext_class = strtolower(substr($class_file, strpos($class_file, '.') + 1)); //lowercases the extension recieved from string position after the '.'
	$ext_student = strtolower(substr($student_file, strpos($student_file, '.') + 1)); //lowercases the extension recieved from string position after the '.'


	if (($ext_teacher == "csv") && ($ext_teacher == "csv") && ($ext_class == "csv") && ($ext_student == "csv")) { //checks if all the files are csv files

		//Teacher information CSV file 
		if ($_FILES['file_teacher']['size'] <= 1000000) { //FILE RESTRICITION TO 1 megabyte per file

				$tmp_name_teacher = $_FILES['file_teacher']['tmp_name'];
				$location = $_SERVER['DOCUMENT_ROOT'] . "/SSO/uploads/" . $teacher_file;
				if (move_uploaded_file($tmp_name_teacher, $location)) { //transfers file to designated location
					echo "<p>UPLOADED</p>";
				}
				else {
					echo "<p>ERROR: FAILED TO WRITE TO THE DIRECTORY</p>";
					exit();
				}
		}
		else {
			echo "<p>ERROR: FILE EXCEEDS 1mb</p>";
		}

		//Class Information CSV FILE UPLOAD
		if ($_FILES['file_class']['size'] <= 1000000) { //FILE RESTRICITION TO 1 megabyte

			$tmp_name_class = $_FILES['file_class']['tmp_name'];
			$location = $_SERVER['DOCUMENT_ROOT'] . "/SSO/uploads/" . $class_file; //transfers file to designated location
			if (move_uploaded_file($tmp_name_class, $location)) {
				echo "<p>UPLOADED</p>";
			}
			else {
				echo "<p>ERROR: FAILED TO WRITE TO THE DIRECTORY</p>";
				exit();
			}
		}
		else {
			echo "<p>ERROR: FILE EXCEEDS 1mb</p>";
			exit();
		}

		//Student Information CSV FILE UPLOAD
		if ($_FILES['file_student']['size'] <= 1000000) { //FILE RESTRICITION TO 1 megabyte

			$tmp_name_student = $_FILES['file_student']['tmp_name'];
			$location = $_SERVER['DOCUMENT_ROOT'] . "/SSO/uploads/" . $student_file; //transfers file to designated location
			if (move_uploaded_file($tmp_name_student, $location)) {
				echo "<p>UPLOADED</p>";
			}
			else {
				echo "<p>ERROR: FAILED TO WRITE TO THE DIRECTORY</p>";
				exit();
			}
		}
		else {
			echo "<p>ERROR: FILE EXCEEDS 1mb</p>";
			exit();
		}


		echo "<p>Starting Sequence</p>";
		include $_SERVER['DOCUMENT_ROOT'] . "/SSO/import_tmp_tables.php";
		echo $_SERVER['DOCUMENT_ROOT'] . "/SSO/import_tmp_tables.php";

	}
	else {
		echo "PLEASE SUBMIT CSV FILES ONLY";
	}
}
else {
	echo "<p>ERROR: PLEASE CHOOSE 3 FILES</p>";
	//exit();
}


?>