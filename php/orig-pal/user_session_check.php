<?php
session_start();
echo $_SESSION['user_id'];
if (empty($_SESSION['user_id'])) {
	header ("Location: /SSO/login/");
	exit();
}
?>