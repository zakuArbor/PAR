<?php
/*
Date Created: 2014-03-06
Connects to SSO DATABASE and runs sql query command
*/

include($_SERVER['DOCUMENT_ROOT'].'/SSO/sso_connect.php'); //connects to sso database
if (isset ($sso_sql)) {
	try {
       		$results_sso = $sso_pdo->query($sso_sql); //runs sql query
	}
	catch (PDOException $e) {
        	echo "<p>ERROR: Failed to retrieve data from database</p>";
        	echo "$e";
        	exit(); //terminates all future code
	}
}
$sso_pdo = null; //terminates connection to SSO DATABASE

?>