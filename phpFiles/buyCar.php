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

$emailSearch = $_SESSION['email'];
$carID = $_POST['hiddenID'];

// connect to the database also handles error message
$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

$sqlSelect = ("SELECT customerID From customers where email='$emailSearch'");
$sqlQuery = mysqli_query($db, $sqlSelect); // Make the query base on type of statement
$customerID = mysqli_fetch_assoc($sqlQuery)["customerID"]; //get The Customers ID
$customerID = (int)$customerID;

<<<<<<< HEAD
$carInsert = ("INSERT INTO transactions (carID, quantity, CustomerID) VALUES ($carID, 1, $customerID)");
$insertQuery = mysqli_query($db, $carInsert);
=======
$addSql = ("INSERT INTO transactions(carID,customerBought) VALUES ('$idforcar','$customerID')"); //searches for bought car
$addQuery = mysqli_query($db, $addSql);

>>>>>>> cf14177c6110c345ec721d619d834a92cd8d56ef

header('Location: ../OnLineCarstore/index.html');
?>
