<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: index.html"); // return to login if email is not set
}

// variables for database connection
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'carstoredata';

// open database connection
$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

// used to figure out which form to check
$HiddentInput = $_POST['hiddenData'];

// Login
if ($HiddentInput=="LogIn"){
    // escape string to remove unwanted inputs to prevent sql injection
    $userEmail = mysqli_real_escape_string($db, $_POST['userEmail']);
    $userPassword = mysqli_real_escape_string($db,$_POST['userPassword']);
    HandleLogInFunction($db, $userEmail, $userPassword);
}
else{// Registration
    // escape string to remove unwanted inputs to prevent sql injection
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $firstName = mysqli_real_escape_string($db,$_POST['firstName']);
    $lastName = mysqli_real_escape_string($db,$_POST['lastName']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    HandleRegisterationFunction($db, $email, $firstName, $lastName, $hashPassword);
}

// function to handle registration
function HandleRegisterationFunction($db,$email, $firstName, $lastName, $hashPassword){

    $addingUser = ("INSERT INTO customers(email,firstName,lastName,password) VALUES ('$email','$firstName','$lastName', '$hashPassword')");
    $addingQuery = mysqli_query($db, $addingUser);
    header('Location:/OnlineCarStore/index.html');
}

// function to handle login
function HandleLogInFunction($db, $userEmail, $userPassword){

    $getCustomerInfo = ("SELECT email, password From customers  Where email = '$userEmail'");
    $getInfoQuery = mysqli_query($db, $getCustomerInfo);
    $customerInfo = mysqli_fetch_array($getInfoQuery);
    $admin = "test@testing.com";
    if(strcmp($userEmail,$admin) == 0) {
      header('Location:/OnlineCarStore/modifydatabase.php');
      $_SESSION["email"] = $userEmail; // set session variable to user email
    }
    else if(password_verify($userPassword, $customerInfo['password'])){
        header('Location:/OnlineCarStore/store.html');
        $_SESSION["email"] = $userEmail; // set session variable to user email
    }
    else{
        header('Location:/OnlineCarStore/index.html');
    }
}
mysqli_close($db); // close database connection
?>
