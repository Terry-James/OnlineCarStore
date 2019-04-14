  <?php
  
  session_start();
  if (!isset($_SESSION['email'])) {
    header("Location: index.html"); // return to login if email is not set
  }
  
  $db_host = 'localhost';
  $db_username = 'root';
  $db_pass = '';
  $db_name = 'carstore';

  $emailSearch = $_SESSION['email'];

  $db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

  $dataArray = array();

  $sqlfindcust = ("SELECT customerID FROM customers WHERE email='$emailSearch'");
  $sqlfindcustquery = mysqli_query($db, $sqlfindcust); // Make the query base on type of statement
  $customerID = mysqli_fetch_assoc($sqlfindcustquery); //get The Customers ID
  $custID = $customerID['customerID'];
  

  $carIdSql = ("SELECT carID FROM transactions WHERE transactions.CustomerID = $custID ");
  $carIdQuery = mysqli_query($db, $carIdSql);
  $carID = mysqli_fetch_assoc($carIdQuery);
  $cID = $carID['carID'];

  $infoSql = ("SELECT * FROM carinfo, customers WHERE carinfo.carID = $cID AND customers.customerID = $custID");
  echo($infoSql);
  $infoQuery = mysqli_query($db, $infoSql);
  
  while ($row = mysqli_fetch_assoc($infoQuery)) {
    $dataArray[] = $row;
  }
  echo json_encode($dataArray);

  ?>
