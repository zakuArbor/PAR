<?php
$sql = "SELECT * FROM comments WHERE comment IS NOT NULL";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php");
 
 while ($item = $results -> fetch(PDO::FETCH_ASSOC)) {
 	$comment_list[] = array ('comment_id' => $item['comment_id'], 'comment' => $item['comment']);
 }
?>