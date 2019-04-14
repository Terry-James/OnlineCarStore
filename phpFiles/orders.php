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

<<<<<<< HEAD
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
=======
    $emailSearch = $_SESSION['email'];
    $sqlfindcust = ("SELECT firstName, lastName, customerID From customers where email='$emailSearch'");
    $sqlfindcustquery = mysqli_query($db, $sqlfindcust); // Make the query base on type of statement

    $customerArray = array(); //Array to get customer information
    $customerArray[] = mysqli_fetch_assoc($sqlfindcustquery); //get The Customers ID
    $customerID = $customerArray[0]['customerID']; //Needed for sqlselect to make it easier

    $data = array(); //array to store data to display on page

    $sqlSelect = ("SELECT * From transactions where customerID='$customerID'");
    $sqlQuery = mysqli_query($db, $sqlSelect);
    while ($row = mysqli_fetch_assoc($sqlQuery)) {

        $data[] = $row['transID'];
        $carMake = $row['carID'];
        $sqlfindcar = ("SELECT make, model From carinfo where carID='$carMake'");
        $sqlfindcustcar = mysqli_query($db, $sqlfindcar); // Make the query base on type of statement
        $carArray = array();
        $carArray[] = mysqli_fetch_assoc($sqlfindcustcar); //get The car make and model
        $data[] = $carArray[0]['make'];
        $data[] = $carArray[0]['model'];
        $data[] = $row['quantity'];
        $data[] = $row['TansDate'];
    }
    echo json_encode($data);
    ?>
>>>>>>> cf14177c6110c345ec721d619d834a92cd8d56ef
