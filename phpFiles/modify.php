<?php
session_start(); // most be first to start a session
if(!isset($_SESSION['email'])){
    header("Location: index.html"); // return to login if email is not set
}

// variables for accessing the database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'carstore';

// used to identify which form is being submitted.
$hiddenValue = $_POST['hiddenData'];

// connect to the database also handles error message
$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

if($hiddenValue == "delete"){  // used to delete a car from a database
    $delValue = $_POST['deleteInput'];
    $delSql = ("DELETE FROM carInfo WHERE carID = $delValue");
    $delQuery = mysqli_query($db, $delSql);
}
else if($hiddenValue == "update"){ // used to update information about a car in database
    $updateValue = $_POST['updateInput'];
    $updateSql = ("UPDATE carInfo () VALUE ()");
    $updateQuery = mysqli_query($db, $updateSql);
}
else{ // used to add a car to the database
    $addMake = $_POST['addMake'];
    $addModel = $_POST['addModel'];
    $addPrice = $_POST['addPrice'];
    $addYear = $_POST['addYear'];

    $addSql = ("INSERT INTO carInfo(make,model,price,year) VALUES ('$addMake','$addModel','$addPrice','$addYear')");
    $addQuery = mysqli_query($db, $addSql);
}
?>
