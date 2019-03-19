<?php
// variables for database connection
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'carstore';

// user inputs from html page
/*$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$password = $_POST['password'];*/

$userEmail = $_POST['userEmail'];
$userPassword = $_POST['userPassword'];


// connect to the database
$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

// insert query
if(isset($firstName)){
    $addingUser = ("INSERT INTO customers(email,firstName,lastName,password) VALUES ('$email','$firstName','$lastName', '$password')");
    $addingQuery = mysqli_query($db, $addingUser);
}
elseif(isset($userEmail)){
    $getCustomerInfo = ("SELECT email, password From customers  Where 'email' = '$userEmail'");
    $getInfoQuery = mysqli_query($db, $getCustomerInfo);
    $customerInfo = mysqli_fetch_assoc($getInfoQuery);

    // TODO
    if($customerInfo['email'] == '$userEmail'){
        print("something");
        header("Location:store.html");
    }
}

?>