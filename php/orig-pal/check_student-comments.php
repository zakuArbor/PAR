<?php
/************************************************************************
Purpose: Checks if student has any comments associated with their class
************************************************************************/
include ($_SERVER['DOCUMENT_ROOT'] . "/php/connect.php"); //connects to wcss_pal database

$comments_valid = 1; //student has existing comments
$sql_comments = "SELECT student_comments.comment_id, comments.comment
		FROM student_comments INNER JOIN comments ON student_comments.comment_id = comments.comment_id
		WHERE  student_comments.Scomment_id = $info[Scomment_id]";

try {
	$comments_result = $pdo -> query ($sql_comments);
	$row_count = $comments_result -> rowCount();
	if ($row_count == 0) {
		$comments_valid = 0; //tells that student does not have any existing comments 
	}
}
catch(PDOException $e) {
	$comments_valid = 0; //tells that student does not have any existing comments
}
//echo "<p>SQL-COMMENT: $sql_comments</p>";
?>