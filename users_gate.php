<?php
SESSION_START();
if (empty($_SESSION['id'])) {
	header ('Location: login.php');
	exit();
}
?>