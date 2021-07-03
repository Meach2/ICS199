<?php
session_start(); //Start session so we can use session variable to get user name 
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'ics199greengrocerdb';

$USERID = $_SESSION['userid']; //get user id from session

$dbc = new mysqli($server,$user,$password,$db); //connect to db 
$query = "SELECT * FROM users WHERE user_name = '$USERID'"; //query to get data from users table based of session 
$result = mysqli_query ($dbc, $query); //run query
$row = $result->fetch_assoc();

$USERID = $_SESSION['userid']; //get user id from session
    
    $dbc = new mysqli($server,$user,$password,$db); //connect to db 
    $query = "SELECT * FROM users WHERE user_name = '$USERID'"; //query to get data from users table based of session 
    $result = mysqli_query ($dbc, $query); //run query
    $row = $result->fetch_assoc();
    
    $legal = $row['legalagreement'];

if($legal == 1){
    $sql= "UPDATE users SET legalagreement = '0' WHERE User_name = '$USERID'";
    $result = mysqli_query ($dbc, $sql); //run query
    header("Location: logout.php");
    exit();
}else{
    header("Location: index.php");
    exit();
}

?>