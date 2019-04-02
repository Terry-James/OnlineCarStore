<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'carstore';

$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

$data = array();

$sqlSelect = ("SELECT make, model, price, year, carID From carInfo");
$sqlQuery = mysqli_query($db, $sqlSelect);
while ($row = mysqli_fetch_assoc($sqlQuery)) {
    $data[] = $row;
}
echo json_encode($data);
 