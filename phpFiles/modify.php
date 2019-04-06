<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: index.html"); // return to login if email is not set
}
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'carstore';

$hiddenValue = $_POST['hiddenData'];

$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

if($hiddenValue == "delete"){
    $delValue = $_POST['deleteInput'];
    $delSql = ("DELETE FROM carInfo WHERE carID = $delValue");
    $delQuery = mysqli_query($db, $delSql);
}
else if($hiddenValue == "update"){
    $updateValue = $_POST['updateInput'];
    $updateSql = ("UPDATE carInfo () VALUE ()");
    $updateQuery = mysqli_query($db, $updateSql);
}
else if($hiddenValue == "adding"){ // change to else if for adding
    $addMake = $_POST['addMake'];
    $addModel = $_POST['addModel'];
    $addPrice = $_POST['addPrice'];
    $addYear = $_POST['addYear']; 

    $addSql = ("INSERT INTO carInfo (make, model, price, year) VALUES ($addMake, $addModel, $addPrice, $addYear)");
    $addQuery = mysqli_query($db, $addSql);
}
else{
    $dataArray = array();
    $userSearch = $_POST['search'];
    $searchSql = ("SELECT * FROM carInfo WHERE make Like '%$userSearch%'");
    $searchQuery = mysqli_query($db, $searchSql);
    while($row = mysqli_fetch_assoc($searchQuery)){
        $dataArray[] = $row;
    }
    print_r($dataArray);
}
?>