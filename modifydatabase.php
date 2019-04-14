<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.html"); // return to login if email is not set
}
$admin = "omarcollado51@gmail.com";
if (strcmp($_SESSION['email'],$admin) != 0) {
  header("Location: ../index.html"); // return to login if email is not set
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./cssFiles/siteStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./javascript/navScript.js"></script>
    <script src="./javascript/storeScript.js"></script>
    <script src="./javascript/allCarScript.js"></script>
    <title></title>
  </head>
  <body>
    <div class="mainNav">
        <ul>
            <li><button class="logOut">log-out</button></li>
            <li><button class="home">Main Page</button></li>
            <li><button class="addCar">Add Car</button></li>
            <li><button class="updateCar">Update Car</button></li>
            <li><button class="deleteCar">Delete Car</button></li>
            <form id="searchBar" action="searchResult.html">
                <input type="text" name="search" class="searchInput" placeholder="Search by make or model">
                <button class="subSearch">Submit</button>
            </form>
        </ul>
    </div>
    <div id="updating">
      <h2>Fill out the Car ID and what you want to update.</h2>
        <form action="./phpFiles/modify.php" method="POST">
            <input type="text" name="updateInput" placeholder="Enter car id">
            <input type="text" name="updateMake" placeholder="Enter new car make">
            <input type="text" name="updateModel" placeholder="Enter new car model">
            <input type="text" name="updatePrice" placeholder="Enter new car price">
            <input type="text" name="updateYear" placeholder="Enter new car year">
            <input type="hidden" name="hiddenData" value="update">
            <input type="submit" name="submit">
        </form>
    </div>
    <div id="deleting">
        <form action="./phpFiles/modify.php" method="POST" class="add_update_delete">
            <input type="text" name="deleteInput" placeholder="Enter car id">
            <input type="hidden" name="hiddenData" value="delete">
            <input type="submit" name="submit">
        </form>
        <table class="information">
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Price</th>
                <th>Year</th>
                <th>ID</th>
            </tr>
            <tbody class="tableData"></tbody>
        </table>
    </div>
    <div id="adding">
        <form action="./phpFiles/modify.php" method="POST">
            All fields are required:
            <input type="text" class="addInputs" name="addMake" placeholder="Enter car make" required>
            <input type="text" class="addInputs" name="addModel" placeholder="Enter car model" required>
            <input type="text" class="addInputs" name="addPrice" placeholder="Enter car price" required>
            <input type="text" class="addInputs" name="addYear" placeholder="Enter car year" required>
            <input type="hidden" name="hiddenData" value="adding">
            <input type="submit" name="submit" id="addButton">
        </form>
    </div>
  </body>
</html>
