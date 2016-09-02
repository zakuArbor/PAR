<?php
$oen = $_POST['oen']; //array need to go through POST since Get has a limit

echo count($oen);
print_r($oen);

while ($i < $x) { 
	$stud_id = student_info($oen[$i]);		
	$year_info = year_info($course_code[$i], $year_start[$i]);
		
	if ($count_affected != 0) {
		$create[] = $stud_id['student_id'];
	}
}
print_r($create);


//insert($year_info, $stud_id);

?>