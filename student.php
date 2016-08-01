<?php
	$teach_id = 1;
	$student_id = $_GET['id'];
	$class_id = $_GET['class'];

	echo "<p><a href = progress_report.php?student_id=$student_id&class=$class_id>Progress Report Card</a></p>";
	echo "<p><a href = report_card.php?student_id=$student_id&class=$class_id>Report Card</a></p>";
?>