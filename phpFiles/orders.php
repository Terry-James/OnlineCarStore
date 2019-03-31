<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../cssFiles/siteStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../javascript/navScript.js"></script>
    <script src="../javascript/storeScript.js"></script>
</head>

<body>
    <div class="mainNav">
        <ul>
            <li><button class="logOut">log-out</button></li>
            <li><button class="viewCars"> View Cars </button></li>
            <li><button class="viewOrders"> View Orders</button></li>
            <form id="searchBar">
                <input type="text" placeholder="Search" name="search">
                <button type="submit">Submit</button>
            </form>
        </ul>
    </div>
    <div class="">
      <h1>Your Orders</h1>
      <table>
        <tr>
          <th>Transaction ID</th>
          <th>Car Type</th>
          <th>Name </th>
        </tr>
      <?php
      $db_host = 'localhost';
      $db_username = 'root';
      $db_pass = '';
      $db_name = 'carstore';

      $db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

      $sqlSelect = ("SELECT * From transactions");
      if($sqlQuery = mysqli_query($db, $sqlSelect)) {
        while($row = $sqlQuery-> fetch_assoc()) {
          echo "<tr><td>". $row["transID"]."</td><td>". $row["carSold"]."</td><td>". $row["customerBought"]."</td></tr>";
        }
        echo "</table>";
      }
      else {
        echo "<h1>you have no transactions</h1>";
      }


       ?>
    </div>
</body>

</html>
