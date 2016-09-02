<?php
$sql = "SELECT b14_15396340_SSO.users.first_name, b14_15396340_SSO.users.last_name FROM b14_15396340_SSO.users 
               INNER JOIN b14_15396340_PAL.class ON b14_15396340_PAL.class.teach_id = b14_15396340_SSO.users.username 
               WHERE b14_15396340_PAL.class.class_id = $class_id";
          include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); //gather the teacher's name
          $teach_info = $results -> fetch(PDO::FETCH_ASSOC);
          $teacher = $teach_info['last_name'] . ", " . $teach_info['first_name']; //teacher name
?>