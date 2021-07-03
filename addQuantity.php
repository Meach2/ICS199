<?php
//Start session and create the sitewide variables for DB connection
session_start(); 
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'ics199greengrocerdb';

//Get the information from POSTED form 
$IDNUM = $_POST['addQuantity']; //take the item id from the form through post (the form is just the delete button)
$USERID = $_SESSION['userid']; //get user id from session

$dbc = new mysqli($server,$user,$password,$db); //connect to db 

//query to get data from users table based of session
$query = "SELECT * FROM users WHERE user_name = '$USERID'";  
$result = mysqli_query ($dbc, $query); 
$row = $result->fetch_assoc();

//change userid from the user name (session variable) to user id number (from database)
$USERID= $row['USER_ID']; 
$query = "SELECT * FROM shopping_cart WHERE PRODUCT_ID = '$IDNUM' AND USER_ID = '$USERID'"; //query to select entry from shopping cart 
$result = mysqli_query ($dbc, $query); //run query
$row = $result->fetch_assoc(); //update row
$quantity = $row['Quantity_Product'] + 1;

$sql= "UPDATE shopping_cart SET Quantity_Product = '$quantity' WHERE PRODUCT_ID = '$IDNUM' and USER_ID = '$USERID'";

//sends the query to add quantity to the entry
$result = mysqli_query ($dbc, $sql); // Run the query.
?>
<?php
header("location:shoppingcart.php"); //redirect to shopping cart page
?>