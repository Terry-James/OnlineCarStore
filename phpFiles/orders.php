<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    header("Location: index.html"); // return to login if email is not set
  }
  
  $db_host = 'localhost';
  $db_username = 'root';
  $db_pass = '';
  $db_name = 'carstoredata';

  $emailSearch = $_SESSION['email'];

  $db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

    $customerArray = array();
    $sqlfindcust = ("SELECT  * From customers, carinfo, transactions  where email='$emailSearch' ");
    $sqlfindcustquery = mysqli_query($db, $sqlfindcust); // Make the query base on type of statement

    while($row = mysqli_fetch_assoc($sqlfindcustquery)){
        $customerArray[] = $row;
    }
    echo json_encode($customerArray);
?>