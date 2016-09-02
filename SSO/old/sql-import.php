<?php
/*
Purpose: To run sql non query to insert information from csv files to its temporary tables
Note: It is very similar to pal-non_query-sql.php located in /php/ but does not terminate the script if it fails but displays an error message and goes to the next
	  sql command

	  ->The connection to the database appears before this script is included to increase effienciency when placing csv data to the database.
	      This is because the database won't open, run sql command, and then close the connection like most of the sql query and execute scripts in PAL a 1000 or
	      more times.
*/


if (isset ($sql)) {
	try {
       		$results = $pdo -> exec($sql); //runs sql query
	}
	catch (PDOException $e) {
        	echo "<p>ERROR: Failed to Update</p>";
        	echo "$e";
    }
}

?>