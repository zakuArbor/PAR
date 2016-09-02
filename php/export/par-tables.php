<?php
header("Content-type: application/zip");
//open/save dialog box
header('Content-Disposition: attachment; filename="par-tables.zip"');
header("Content-length:".filesize("par-tables.zip"));
//read from server and write to buffer
readfile('par-tables.zip');

?>