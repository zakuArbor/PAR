<?php
/*
SQL PREPARED STATEMENT
*/
include ($_SERVER['DOCUMENT_ROOT'].'/PAR/php/connect.php'); //connects to pal database

function array_prepare_select ($sql, $pdo) {
  if (isset ($sql)) {
  	try {

            $prep = $pdo -> prepare($sql);
         		$prep->execute();
            $results = $prep->fetchAll();
            return $results;
            #$count_affected = $results -> rowCount(); //counts affected rows
  	}
  	catch (PDOException $e) {
          	echo "<p>ERROR: Failed to retrieve data from database</p>";
          	echo "$e";
          	exit(); //terminates all future code
  	}
  }
}

function single_return_prepare_select ($sql, $pdo) {
  if (isset ($sql)) {
      try {
              $prep = $pdo -> prepare($sql);
              $prep->execute();
              $results = $prep->fetch(PDO::FETCH_ASSOC);
              return $results;
              #$count_affected = $results -> rowCount(); //counts affected rows
      }
      catch (PDOException $e) {
              echo "<p>ERROR: Failed to retrieve data from database</p>";
              echo "$e";
              exit(); //terminates all future code
      }
    }

}

function prepare_insert ($sql, $pdo) {
  if (isset ($sql)) {
      try {
              $prep = $pdo -> prepare($sql);
              $prep->execute();
      }
      catch (PDOException $e) {
              echo "<p>ERROR: Failed to retrieve data from database</p>";
              echo "$e";
              exit(); //terminates all future code
      }
    }

}

?>