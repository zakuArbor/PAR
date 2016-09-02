<?php
header("Content-type: application/zip");
//open/save dialog box
header('Content-Disposition: attachment; filename="wcss_pal-tables.zip"');
header("Content-length:".filesize("wcss_pal-tables.zip"));
//read from server and write to buffer
readfile('wcss_pal-tables.zip');

?>