<?php
function form_level ($current_level, $pdo) {

	function level ($pdo) {
		$sql = "SELECT level_id, level FROM progress_level";
		#include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/par-sql.php");	
		return array_prepare_select($sql, $pdo);
	}

	$levels = level($pdo);
	
	echo "<b>Progress:</b> <select class='' name = 'level'>";
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


function comment_display ($student_comments) {
	
	function comments () {
		$sql = "SELECT comment_id, comment FROM comment_list";
		include ($_SERVER['DOCUMENT_ROOT'] . "/PAR/php/par-sql.php");
		return $results;
	}
	$comments = comments();

	echo "<b>COMMENTS:</b>";
	print_r($student_comments);
	foreach ($comments as $comment) {
		echo "<input type = 'checkbox' name = 'comments'";
		if ($comment['comment_id']) {

		}

	}
	echo "<input type = 'checkbox' name = 'comments'";

	echo " value ='' checked=''>";
}
?>