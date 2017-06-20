<?php
$file = (array_key_exists("file", $_GET))?$_GET['file']:$argv[1];
$file = basename($file);
if(file_exists($file)) readfile($file);
?>