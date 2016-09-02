<?php
/********************************************************************
Purpose: Retrieves a list of student attending a specified class and their progress report level
********************************************************************/
$sql = "SELECT students.first, students.last, students.student_id, progress_report.level_id  
		FROM students
        INNER JOIN student_progress ON student_progress.student_id = students.student_id
        INNER JOIN progress_report ON student_progress.progress_id = progress_report.progress_id
        WHERE student_progress.class_id = $class_id ORDER BY students.last";

include($_SERVER["DOCUMENT_ROOT"]."/php/pal-sql.php"); //runs sql query and connection to PAL Db
?>