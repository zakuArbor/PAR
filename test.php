
/*

<?php
$sth = $dbh->prepare("SELECT name, colour FROM fruit");
$sth->execute();

/* Fetch all of the remaining rows in the result set */
#print("Fetch all of the remaining rows in the result set:\n");
#$result = $sth->fetchAll();
#print_r($result);
?>

*/


	#$sql = "SELECT COUNT(progress_id) as total FROM student_progress;";
	#include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/par-sql.php");
	#$pLast_id = $results -> fetch(PDO::FETCH_ASSOC);
	#$pLast_id = $pLast_id['total'] + 1;

	#FIX METHOD OF INSERTING NEW DATA INTO PROGRESS_REPORT SINCE PROGRESS_REPORTS.PROGRESS_ID CONCIDES WITH THE STUDENT_PROGRSS.PROGRESS_ID

	/*
	echo "gate1";

	
	$sql = "SELECT MAX(sComment_id) as total FROM progress_report;";
	include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/par-sql.php");
	$sComment_id = $results -> fetch(PDO::FETCH_ASSOC);
	$sComment_id = $sComment_id['total'] + 1;
	

	echo "gate2";

	$sql = "INSERT INTO progress_report (level_id, interview_request, sComment_id) VALUES (0, 0, $sComment_id)";
	include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/par-sql.php");
	$pLast_id = $last_id;

	echo "<br>". $pLast_id . "<br>";
	echo "gate3";

	$sql = "SELECT MAX(progress_id) as total FROM progress_report;";
	include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/par-sql.php");
	$sComment_id = $results -> fetch(PDO::FETCH_ASSOC);
	$sComment_id = $sComment_id['total'] + 1;
		


	include ($_SERVER['DOCUMENT_ROOT'].'/PAR/php/connect.php'); //connects to pal database
	
	$sql = "INSERT INTO student_progress 
				(progress_id, student_id, class_id, year_id) 
				VALUES  (:progress_id, :student_id, :class_id, :year_id)";
	$s = $pdo -> prepare($sql);
	$s -> bindParam(':progress_id', $pLast_id);
	$s -> bindParam(':student_id', $student_id);	
	$s -> bindParam(':class_id',$class_id); 
	$s -> bindParam(':year_id', $year_id['year_id']);
	#$s -> execute();
	*/