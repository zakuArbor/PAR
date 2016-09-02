<?php
/*
-pdo is an extension built in php
-another way to connect to database than mysqli
-support different database drivers such as oracle and MS SQL SERVER (although using only MySQL)
*/
try {
     $pdo = new PDO('mysql:host=sql111.byethost14.com;dbname=b14_15396340_SSO', 'b14_15396340', 'laptop104'); //connects to database
     $pdo -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //to print an error whenever PDO Object fails to do its task
     $pdo -> exec ('SET NAMES "utf8" '); //sets character set for the database to use because the default character set is latin-1
}
catch (PDOException $e){
     echo "Unable to connect to the database server";
     $e-> getMessage();
     exit();
}

?>