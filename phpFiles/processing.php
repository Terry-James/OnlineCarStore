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

$db = new mysqli($db_host, $db_username, $db_pass, $db_name) or die("Can't connect to MySQL Server");

$HiddentInput = $_POST['hiddenData'];

if ($HiddentInput=="LogIn"){
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    HandleLogInFunction($db, $userEmail, $userPassword);
}
else{
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    HandleRegisterationFunction($db, $email, $firstName, $lastName, $hashPassword);
}

function HandleRegisterationFunction($db,$email, $firstName, $lastName, $hashPassword){

    $addingUser = ("INSERT INTO customers(email,firstName,lastName,password) VALUES ('$email','$firstName','$lastName', '$hashPassword')");
    $addingQuery = mysqli_query($db, $addingUser);
    header('Location:/OnlineCarStore/index.html');
}


function HandleLogInFunction($db, $userEmail, $userPassword){

    $getCustomerInfo = ("SELECT email, password From customers  Where email = '$userEmail'");
    $getInfoQuery = mysqli_query($db, $getCustomerInfo);
    $customerInfo = mysqli_fetch_array($getInfoQuery);
    $admin = "test@testing.com";
    if(strcmp($userEmail,$admin) == 0) {
      header('Location:/OnlineCarStore/modifydatabase.php');
      $_SESSION["email"] = $userEmail;
    }
    else if(password_verify($userPassword, $customerInfo['password'])){
        header('Location:/OnlineCarStore/store.html');
        $_SESSION["email"] = $userEmail;
    }
    else{
        header('Location:/OnlineCarStore/index.html');
    }
}
mysqli_close($db);
?>
