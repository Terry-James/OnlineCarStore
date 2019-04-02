<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'carstore';

$hiddenValue = $_POST['hiddenValue'];

$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

?>