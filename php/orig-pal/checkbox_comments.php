<?php
//Purpose: Display all available comments from the database to a checkbox for teachers to select
include ($_SERVER['DOCUMENT_ROOT'] . "/php/check_student-comments.php"); //gathers all existing comments for the student
$comment_element_count = 0;
if ($comments_valid == 1) { //if there are any existing comments
	foreach ($comments_result as $item) {
		$comments[] = array('comment_id' => $item['comment_id'], 'comment' => $item['comment']);
		$comment_element_count++;
	}
}

$i = 0;
include ($_SERVER['DOCUMENT_ROOT'] . "/php/comments.php"); //retrieves all available comments in the database

foreach ($comment_list as $item) {
	$echo_comment = "\n<div class='mobileProgress' id='sComment'><label for='single_checkbox[$i]'><input id = 'single_checkbox[$i]' style='width:25px; height:25px;'type = 'checkbox' onClick='checkboxlimit();' 
			  name = 'comment_id[]' value = '" . $item['comment_id'] . "'";
	if (!empty($comments)) {
		for ($loop = 0; $loop < $comment_element_count; $loop++) {
			if ($comments[$loop]['comment_id'] == $item['comment_id']) {
				$echo_comment .= " checked";
								
				//echo $comments[$loop]['comment_id'] . "<\n>";			
			}
		}
	}
	$echo_comment .= ">" . $item['comment'] . "</label></div>";
	echo $echo_comment;
	$echo_comment = NULL;
	$i++;
}


?>


