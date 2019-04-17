<?php

$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'carstoredata';



$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");


$dataArray = array();
$userSearch = $_REQUEST['q'];
$searchSql = ("SELECT * FROM carInfo WHERE make Like '%$userSearch%'");
$searchQuery = mysqli_query($db, $searchSql);
while($row = mysqli_fetch_assoc($searchQuery)){
    $dataArray[] = $row;
}
echo json_encode($dataArray);

?>