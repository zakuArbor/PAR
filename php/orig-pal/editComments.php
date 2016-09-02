<?php
$comment = $_POST['comment'];
$id_update = $_POST['update_id'];

$counter = 0;

print_r($comment);
echo "<p><p>";
print_r($id_update);
echo "<p>";
echo $_POST['count'];
echo "<p><p>";

foreach ($comment as $item) {
	if (!empty($item)) {
		$sql = "UPDATE comments SET comment = '$item' WHERE comment_id = $id_update[$counter]";
		echo "<p>$sql</p>";
		include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-sql.php"); 
	}
	$counter++;
}

if ($_POST['new_comment']) {
	$sql = "INSERT INTO comments (comment) VALUES ('$_POST[new_comment]')";
	include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php"); 
}
header('Location: /editReport.php');
?>