<?php
session_start();
if (!isset($_SESSION['email'])) {
  $transactionsArray = false;
}
else{
  $db_host = 'localhost';
  $db_username = 'root';
  $db_pass = '';
  $db_name = 'carstoredata';

  // grab email of current user
  $emailSearch = $_SESSION['email'];

  // open database connection
  $db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

    $transactionsArray = array();
    $findcustomer = ("SELECT customerID from customers WHERE email = '$emailSearch'");
    $sqlfindcustquery = mysqli_query($db, $findcustomer); // Make the query base on type of statement
    $custID = mysqli_fetch_assoc($sqlfindcustquery)['customerID'];

    $sqlfindtransactions = ("SELECT * FROM transactions INNER JOIN carinfo ON transactions.carID = carinfo.carID WHERE transactions.customerID = '$custID'");
    $sqlfindtransactionsquery = mysqli_query($db, $sqlfindtransactions); // Make the query base on type of statement

    while($row = mysqli_fetch_assoc($sqlfindtransactionsquery)){
        $transactionsArray[] = $row;
    }
    mysqli_close($db); // close database connection
}
echo json_encode($transactionsArray); // return back json with queried data
?>