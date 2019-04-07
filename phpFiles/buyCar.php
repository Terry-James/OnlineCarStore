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

// connect to the database also handles error message
$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

// create an array to hold json data
$data = array();
$emailSearch = $_SESSION['email'];
// query statement for database lookup
$sqlSelect = ("SELECT customerID From customers where email='$emailSearch'");
$sqlQuery = mysqli_query($db, $sqlSelect); // Make the query base on type of statement
while ($row = mysqli_fetch_assoc($sqlQuery)) { // while there are rows keep adding them to data variable
    $data[] = $row;
}
echo json_encode($data); // encode data as json to be used by ajax call

?>
