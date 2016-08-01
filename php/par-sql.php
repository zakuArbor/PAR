<?php
/*
Date Created: 2014-03-06
Connects to PAL DATABASE and runs sql query command
*/

include ($_SERVER['DOCUMENT_ROOT'].'/PAR/php/connect.php'); //connects to pal database

if (isset ($sql)) {
	try {
       		$results = $pdo->query($sql); //runs sql query
       		$count_affected = $results -> rowCount(); //counts affected rows
       		$last_id = $pdo->lastInsertId();
	}
	catch (PDOException $e) {
        	echo "<p>ERROR: Failed to retrieve data from database</p>";
        	echo "$e";
        	exit(); //terminates all future code
	}
}
$pdo = null;

?>