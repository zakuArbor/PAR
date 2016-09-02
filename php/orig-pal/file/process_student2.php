<?php
/*REGISTER STUDENT INTO CLASSES****************************************************************************************/
$sql = "SELECT school_year, first_name, last_name, oen_number, class_code FROM temp_students";
include ($_SERVER['DOCUMENT_ROOT'].'/php/pal-sql.php');	
while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
			   $student_class_import[] = array('year' => $item['school_year'], 'first' => $item['first_name'], 'last' => $item['last_name'], 
			   'oen' => $item['oen_number'], 'course_code' => $item['class_code']);
}
echo "test1";
/*
If you place the max progress_id and Scomment_id here and in the loop to increment, then the code would be more efficient
But currently the import is still in developing stages. Therefore, data can be messed up.
*/
include "functions.php";
echo "gate1";
foreach ($student_class_import as $student) { 
	$year_start = substr($student['year'], 0, 4);
	$count_affected = student_check($student['oen'], $student['last'], $year_start, $student['course_code']); //verfies student's existance
	if ($count_affected == 0) { //students passed this point do not have a progress report card
		$gate1[] = $student['oen'];
	}
}
echo "test2";
/**********************************************************************************************************************/
/*****Eliminates repeated OEN********/
$gate2 = array_unique($gate1); //removes duplicate values in array
foreach ($gate2 as $gates) {
	$gate3[] = $gates; //sorts values into orderly elements (ex. element 5, 10, 20 =? 0, 1, 2)
}
/***********************************/
//insert($year_info, $stud_id);
print_r($gate3);
?>
<form action = "process_student3.php" method = "POST">
	<input type = "hidden" name = "oen" value = "<?php echo $gate3; ?>">
	<input type = "Submit" value = "PLEASE CLICK HERE TO PROCEED TO FINALIZE THE PROCESS">
</form>