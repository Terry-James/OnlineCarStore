<?php
session_start(); // most be first to start a session
if(!isset($_SESSION['email'])){
    $dataArray = false;
}
else{
    $db_host = 'localhost';
    $db_username = 'root';
    $db_pass = '';
    $db_name = 'carstoredata';

    // open database connection
    $db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

    $dataArray = array();// create array to store json data
    $userSearch = $_REQUEST['q'];
    $searchSql = "SELECT * FROM carInfo WHERE make Like '%$userSearch%'";
    $searchQuery = mysqli_query($db, $searchSql);
    while($row = mysqli_fetch_assoc($searchQuery)){
        $dataArray[] = $row;
    }
    mysqli_close($db); // close database connection
}
echo json_encode($dataArray);// return data as json
?>