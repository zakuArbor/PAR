<?php
session_start();
#echo $_SESSION['user_id'];
if (empty($_SESSION['id'])) {
	header ("Location: /SSO/");
	exit();
}
?>