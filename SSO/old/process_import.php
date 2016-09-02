<?php
/*
Purpose: To process all data from the temp tables to its appropiate tables. Basically, it retrieves nessecary data
PROBLEM: ANY TEACHER THAT HAVE DIFFERENT LAST NAME BETWEEN RIDE AND MAMA WILL NOT BE IMPORTED INTO THE PAL DATABASE
*/
echo "<p>INTIALIZING CREATION OF USER ACCOUNTS A</p>";

/*Adds a year entree if there is an unknown year entry***************/
$sso_sql = "SELECT legal_first_name, legal_surname, staff_no FROM temp_teachers";
echo $_SERVER['DOCUMENT_ROOT'].'/SSO/sso-sql.php';
include ($_SERVER['DOCUMENT_ROOT'].'/SSO/sso-sql.php'); 
echo "<p>$sso_sql</p>";
while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
  $teachers[] = array('id' => $item['staff_no'], 'first_name' => $item['legal_first_name'], 'last_name' => $item['legal_surname']);
  echo "testing";
}
print_r($teachers);
$i = 1;
foreach ($teachers as $teacher) { 
	$sso_sql = "SELECT username FROM users 
			WHERE username = $teacher[id]";
	include ($_SERVER['DOCUMENT_ROOT'].'/SSO/sso-sql.php'); 
	echo "<p>$sso_sql</p>";
	if ($count_affected == 0) {
		//exit();
		$sso_sql = "INSERT INTO users (username, password, first_name, last_name) VALUES ('$teacher[id]', 'password', '$teacher[first_name]', '$teacher[last_name]')";
		include ($_SERVER['DOCUMENT_ROOT'].'/SSO/sso-sql.php');
		echo "<p><h3>$sso_sql</h3></p>";
		$sso_sql = "INSERT INTO permission (permission_id, permission_type) VALUES ('$i', 'teacher')";
		include ($_SERVER['DOCUMENT_ROOT'].'/SSO/sso-sql.php');
		$i++;
	}
}
/********************************************************************/
/**********************************************************************************************************************/
?>