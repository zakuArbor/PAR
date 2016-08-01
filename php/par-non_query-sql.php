<?php
include ($_SERVER['DOCUMENT_ROOT'].'/PAR/php/connect.php'); //connects to pal database

if (isset ($sql)) {
	try {
       		$results = $pdo -> exec($sql); //runs sql query
	}
	catch (PDOException $e) {
			$results = null;
        	echo "<p>ERROR: Failed to Update</p>";
        	echo "$e";
        	exit(); //terminates all future code
	}
}
$pdo = null;

?>