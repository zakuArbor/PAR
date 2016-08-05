<?php
if (empty($_POST['level'])) {
	echo "INVALID: Form has not been sent";
}
else {
	#GATHER ALL POST DATA###################################################
	$progress_report = $_POST['progress_report'];
	$level_id = $_POST['level'];
	$comments = $_POST['comments'];
	$interview_request = $_POST['interview_request'];
	########################################################################
	include ($_SERVER['DOCUMENT_ROOT'].'/PAR/php/connect.php'); //connects to pal database
	#UPDATE level and interview request#####################################
	try{
		$sql = "UPDATE student_progress SET level_id = :level_id, interview_request = :interview_request WHERE progress_id = :progress_id";
		$s = $pdo -> prepare($sql);
		$s -> bindParam(':level_id',$level);
		$s -> bindParam(':interview_request', $interview_request);
		$s -> bindParam(':progress_id', $progress_report);
		#$s -> execute();
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}
	########################################################################
	#UPDATE COMMENTS########################################################
	
	#1. DELETE ALL CURRENT STUDENT COMMENTS
	#2. INSERT ALL NEW STUDENT COMMENTS

	try {
		$sql = "DELETE FROM progress_comments WHERE progress_id = :progress_id;";
		$s = $pdo -> prepare($sql);
		$s -> bindParam(':progress_id',$progress_id);
		#$s -> execute();
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}
	try {
		$sql = "INSERT INTO  progress_comments (progress_id, comment_id)
				VALUES (:progress_id, :comment_id)";
		$s = $pdo -> prepare($sql);
		foreach ($comments as $comment_id) {
			$s -> bindParam(':progress_id',$progress_id);
			$s -> bindParam(':comment_id',$comment_id);
			#$s -> execute();
			echo $comment_id;
		}
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}
	########################################################################
}
?>