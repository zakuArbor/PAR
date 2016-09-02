<?php

try {
	$sql = "SELECT EXISTS( SELECT class_id FROM class WHERE staff_id = :staff_id AND class_id = :class_id)";
	$teacher_security_valid = current(single_return_prepare_select($sql, $pdo, ['staff_id' => $_SESSION['id'], 'class_id' => $class_id]));
}
catch(PDOException $e) {
	$teacher_security_valid = 0; //tells that teacher has no privelege to access to the class
}

/*
try {
	$security_result = $pdo -> query ("SELECT class_id FROM class WHERE staff_id = $_SESSION['id'] AND class_id = $class_id");
	$row_count = $security_result -> rowCount();
	if ($row_count == 0) {
		$teacher_security_valid = 0; //tells that teacher has no privelege to access to the class
	}
}
catch(PDOException $e) {
	$teacher_security_valid = 0; //tells that teacher has no privelege to access to the class
}*/
?>