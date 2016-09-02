<?php
/*******************************************************************************************
Purpose: Checks if the student has any registered class
*******************************************************************************************/
$class_valid = 1; //student has registed class 

try {
        $sql = "SELECT class_id FROM student_progress 
        		INNER JOIN year ON year.year_id = student_progress.year_id
        		WHERE student_id = :student_id";
        $prep = $pdo -> prepare($sql);            
     	$prep->execute([':student_id' => $student_id]);
        $row_count = $prep -> rowCount();
        if ($row_count == 0) {
			$class_valid = 0; //tells that student does not have any registered classes
		}
  	}
  	catch (PDOException $e) {
    	$class_valid = 0; //tells that student does not have any registered classes
  	}
?>