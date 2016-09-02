<?php
include($_SERVER['DOCUMENT_ROOT'].'/php/user_session_check.php'); //checks if user is logged on
$permission_status = 0;
foreach ($_SESSION['permissions'] as $item) {
	//echo $item;
	if ($item['position'] == "teacher" OR $item['position'] == "sso_admin") { 
		$permission_status = 1;
	}
}
if ($permission_status == 1) {

	include ($_SERVER['DOCUMENT_ROOT'].'/php/prepare_sql.php');
	if (empty($_POST['level']) or empty($_POST['progress_report'])) {
		echo "INVALID: Form has not been sent";
	}
	else {
		#GATHER ALL POST DATA###################################################
		$progress_report = $_POST['progress_report'];
		$level_id = $_POST['level'];
		$comments = $_POST['comments'];
		$interview_request = $_POST['interview_request'];
		$class_id = $_POST['class_id'];
		########################################################################
		#UPDATE level and interview request#####################################
		$sql = "UPDATE progress_report SET level_id = :level_id, interview_request = :interview_request WHERE progress_id = :progress_id";
		$variables = array(':level_id' => $level_id, ':interview_request' => $interview_request, ':progress_id' => $progress_report);
		prepare_non_query($sql, $pdo, $variables);
		########################################################################
		#UPDATE COMMENTS########################################################
		
		#1. DELETE ALL CURRENT STUDENT COMMENTS
		#2. INSERT ALL NEW STUDENT COMMENTS
		try {
			$sql = "DELETE FROM progress_comment WHERE progress_id = :progress_id;";
			$s = $pdo -> prepare($sql);
			$s -> bindParam(':progress_id',$progress_report);
			$s -> execute();
		} catch(PDOException $e) {
			echo $e -> getMessage();
		}
		try {
			$sql = "INSERT INTO  progress_comment (progress_id, comment_id)
					VALUES (:progress_id, :comment_id)";
			$s = $pdo -> prepare($sql);
			foreach ($comments as $comment_id) {
				$s -> bindParam(':progress_id',$progress_report);
				$s -> bindParam(':comment_id',$comment_id);
				$s -> execute();
				#echo $comment_id;
			}
		} catch(PDOException $e) {
			echo $e -> getMessage();
		}
		########################################################################
		#LINK TO NEXT STUDENT###################################################
		$sql = "SELECT student_id FROM student_progress WHERE progress_id = :progress_report";
		$variables = array(':progress_report' => $progress_report);
		$student_id = single_return_prepare_select($sql, $pdo, $variables);

		include ($_SERVER['DOCUMENT_ROOT'].'/php/gather_class_student.php');
		$i = 0;
		foreach ($students as $student) {
			
			if ($student['student_id'] == $student_id['student_id']) {
				$i+=1;
				$student_id = $students[$i]['student_id'];
				header("Location: /student_report.php?stud_id=$student_id&class=$class_id");	
				break;			
			}
			$i+=1;
		}
		########################################################################

	}
}
?>