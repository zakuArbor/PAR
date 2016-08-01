<?php

try {
     $pdo = new PDO('mysql:host=localhost;dbname=par', 'root', ''); //connects to database
     $pdo -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //to print an error whenever PDO Object fails to do its task
     $pdo -> exec ('SET NAMES "utf8" '); //sets character set for the database to use because the default character set is latin-1
}
catch (PDOException $e){
     echo "Unable to connect to the database server";
     $e-> getMessage();
     exit();
}

?>