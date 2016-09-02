<?php
/*
Date Created: 2014-03-06
Connects to SSO DATABASE and runs sql query command
*/

include($_SERVER['DOCUMENT_ROOT'].'/SSO/sso_connect.php'); //connects to sso database
echo "Hello 1";
if (isset ($sso_sql)) {
	echo "Hello";
	try {
       		$results = $pdo->query($sso_sql); //runs sql query
       		$count_affected = $results -> rowCount(); //counts affected rows
	}
	catch (PDOException $e) {
        	echo "<p>ERROR: Failed to retrieve data from database</p>";
        	echo "$e";
        	exit(); //terminates all future code
	}
}
$sso_pdo = null; //terminates connection to SSO DATABASE

?>