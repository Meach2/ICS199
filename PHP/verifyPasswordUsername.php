<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // enable exceptions

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'ics199greengrocerdb';

$conn = mysqli_connect($server,$user,$password,$db);

if (!$conn) {
    echo "Connection Failed. Try again." . mysqli_connect_error();
    exit();
} else {
    echo "Connection Successful <br />";
} 

$UserName = mysqli_real_escape_string($_POST['username']);
$Password = mysqli_real_escape_string($_POST['password']); 

$sql = "SELECT * FROM users WHERE User_Name = '$UserName' AND Encrypted_Password = '$Password' ";
$result = mysqli_query($dbLink, $sql) or die(mysqli_error());
$numrows = mysqli_num_rows($result, MYSQLI_ASSOC);

if ($numrows == 0) {
    echo "wrong username or password";
} else {
    echo "welcome";
}

// Close the database connection
mysqli_close();

?>