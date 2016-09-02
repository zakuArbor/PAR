<?php
session_start();
session_destroy();
echo "session is destroyed";
header('Location: /');
?>
<a href = "/SSO/login/">Back</a>