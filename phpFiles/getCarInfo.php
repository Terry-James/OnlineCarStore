<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'carstore';

$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

function getSample(){

    $sqlSelect = ("SELECT * From carInfo");
    $sqlQuery = mysqli_query($db, $sqlSelect);
    $carValues = mysqli_fetch_array($sqlQuery);

    for($i = 0; $i < 5 ; $i++){
        echo ($carValues['model'];)
    }
}
?>