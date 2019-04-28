<?php
session_start(); // most be first to start a session
if(!isset($_SESSION['email'])){
    header("Location: index.html"); // return to login if email is not set
}

// variables for accessing the database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'carstoredata';

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
    $updateMake = $_POST['updateMake'];
    $updateModel = $_POST['updateModel'];
    $updatePrice = $_POST['updatePrice'];
    $updateYear = $_POST['updateYear'];
    if(strcmp($updateValue, '') != 0) {
      $updateValue = (int) $updateValue;
      if(strcmp($updateMake, '') != 0) {
        $updateMakeDb = ("UPDATE carInfo SET make= '$updateMake' WHERE carID = $updateValue");
        $updateMakeQuery = mysqli_query($db, $updateMakeDb);
      }
      if(strcmp($updateModel, '') != 0) {
        $updateModelDb = ("UPDATE carInfo SET model= '$updateModel' WHERE carID = $updateValue");
        $updateModelQuery = mysqli_query($db, $updateModelDb);
      }
      if(strcmp($updatePrice, '') != 0) {
        $updatePriceDb = ("UPDATE carInfo SET price= '$updatePrice' WHERE carID = $updateValue");
        $updateMakeQuery = mysqli_query($db, $updatePriceDb);
      }
      if(strcmp($updateYear, '') != 0) {
        $updateYearDb = ("UPDATE carInfo SET year= '$updateYear' WHERE carID = $updateValue");
        $updateYearQuery = mysqli_query($db, $updateYearDb);
      }
    }
}
else{ // used to add a car to the database
  $addFile = $_POST['addFiles'];   
  $addMake = $_POST['addMake'];
  $addModel = $_POST['addModel'];
  $addPrice = $_POST['addPrice'];
  $addYear = $_POST['addYear'];
  $imageLoc = "images/";

  $stringImage = $imageLoc.$addFile;
  

  $addSql = ("INSERT INTO carInfo(carImageID,make,model,price,year) VALUES ('$stringImage','$addMake','$addModel','$addPrice','$addYear')");
  $addQuery = mysqli_query($db, $addSql);
}
mysqli_close($db);
header("Location: ../modifydatabase.html");
