<?php
function form_level ($current_level, $pdo) {

	function level ($pdo) {
		$sql = "SELECT level_id, level FROM progress_level";
		#include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/par-sql.php");	
		return array_prepare_select($sql, $pdo, []);
	}

	$levels = level($pdo);
	echo "<b class='mobileProgress'>Progress:</b> <select class='mobileProgress' name = 'level'>";
	foreach ($levels as $level) {
		if ($current_level == $level['level_id']) {
			echo "<option  value = '$level[level_id]' selected>$level[level]</option>";
		}
		else { 
			echo "<option  value = '$level[level_id]'>$level[level]</option>";
		}
	}
	echo "</select>";
}


function comment_display ($student_comments, $pdo) {
	/*************************************************
	*Purpose: Gather all available comments for teachers to select and display them 
	*Given: array, db Connection
	*Return: None
	*************************************************/
	function comments ($pdo) {
		/*************************************************
		*Purpose: Gather all available comments for teachers 
		*Given: db Connection
		*Return: array
		*************************************************/
		$sql = "SELECT comment_id, comment FROM comment_list";
		#include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/par-sql.php");
		return array_prepare_select($sql, $pdo, []);
	}

	
	$comments = comments($pdo);
	$existing_student_comments = array();
	
	foreach ($student_comments as $student) {
		array_push($existing_student_comments, $student['comment_id']);
	}
	
	echo "<p><b>COMMENTS:</b></p>";
	foreach ($comments as $comment) {
		echo "<p>$comment[comment]<input type = 'checkbox' name = 'comments[]'  value ='$comment[comment_id]'";
		
		if (in_array($comment['comment_id'], $existing_student_comments)) {
			echo "checked=''";
		}
		echo "></p>\n";
	}
}
?>