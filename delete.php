<?php
session_start(); //Start session so we can use session variable to get user name 
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'ics199greengrocerdb';

$IDNUM = $_POST['delete']; //take the item id from the form through post (the form is just the delete button)
$USERID = $_SESSION['userid']; //get user id from session
//create connection
$dbc = new mysqli($server,$user,$password,$db); //connect to db 
$query = "SELECT * FROM users WHERE user_name = '$USERID'"; //query to get data from users table based of session 
$result = mysqli_query ($dbc, $query); //run query
$row = $result->fetch_assoc();
$USERID= $row['USER_ID']; //change userid from the user name (session variable) to user id number (from database)


//$qtyquery = "SELECT Quantity_Product FROM shopping_cart WHERE PRODUCT_ID = '$IDNUM' AND USER_ID = '$USERID'"; //missing semi colon cause errrors do we need this query  never called on? - CW
//$pricequery = "SELECT Quantity_Product FROM shopping_cart WHERE PRODUCT_ID = '$IDNUM' AND USER_ID = '$USERID'";//missing semi colon cause errors, do we need this query never called on? - CW 


//Define the query
$query = "DELETE FROM shopping_cart WHERE PRODUCT_ID = '$IDNUM' AND USER_ID = '$USERID'"; //delete row from shopping cart where product number and user id number are a match


//sends the query to delete the entry
$result = mysqli_query ($dbc, $query); // Run the query.


?>

<?php
header("location:shoppingcart.php"); //redirect to shopping cart page
?>