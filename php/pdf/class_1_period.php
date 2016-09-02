<?php
/*
Purpose: To gather all class_id in period 1
*/

include ($_SERVER['DOCUMENT_ROOT'].'/php/connect.php'); //connects to pal database

$sql = "SELECT class.class_id FROM class INNER JOIN year ON class.year_id = year.year_id 
		WHERE class.period = 1 AND year.default = 1"; //fetches all the class_id in period 1 in the default year

if ($sql) {
	try {
       		$results = $pdo->query($sql); //runs sql query
       		while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
  				$class_1[] = $item['class_id'];
			}
			$class_1_count = $results -> rowCount();
	}
	catch (PDOException $e) {
        	echo "<p>ERROR: Failed to retrieve classes in 1 period id from database</p>";
        	echo "$e";
        	exit(); //terminates all future code
	}
}
$pdo = null;


?>