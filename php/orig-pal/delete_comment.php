<?php
$id = $_GET['delete'];
$sql = "DELETE FROM comments WHERE comment_id = $id";
include ($_SERVER['DOCUMENT_ROOT'] . "/php/pal-non_query-sql.php");
echo "<p>$sql</p>";
header("Location: /editReport.php");
?>