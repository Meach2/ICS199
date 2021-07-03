<?php
session_start(); //Start session so we can use session variable to get user name 
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'ics199greengrocerdb';

$IDNUM = $_POST['addQuantity']; //take the item id from the form through post (the form is just the delete button)
$USERID = $_SESSION['userid']; //get user id from session
//create connection
$dbc = new mysqli($server,$user,$password,$db); //connect to db 
$query = "SELECT * FROM users WHERE user_name = '$USERID'"; //query to get data from users table based of session 


$result = mysqli_query ($dbc, $query); //run query
$row = $result->fetch_assoc();
$USERID= $row['USER_ID']; //change userid from the user name (session variable) to user id number (from database)
//Define the query
$query = "SELECT * FROM shopping_cart WHERE PRODUCT_ID = '$IDNUM' AND USER_ID = '$USERID'"; //query to select entry from shopping cart 
$result = mysqli_query ($dbc, $query); //run query
$row = $result->fetch_assoc(); //update row
$quantity = $row['Quantity_Product']; //make quantity variable from ammount in db
#$product_id = "SELECT product_id FROM shopping_cart WHERE user_id = ;$USERID";
#$pricequery = "SELECT Price_Product FROM product WHERE PRODUCT_ID = '$product_id'";
#echo "$pricequery";
#$tax = 1.06;
#$_SESSION['total'] = $_SESSION['total'] - (intval($pricequery) * $tax);


if ($quantity > 1){
    $quantity = $row['Quantity_Product'] - 1;
    $sql= "UPDATE shopping_cart SET Quantity_Product = '$quantity' WHERE PRODUCT_ID = '$IDNUM' and USER_ID = '$USERID'";
    echo "$pricequery";
} else{
    $sql = "DELETE FROM shopping_cart WHERE PRODUCT_ID = '$IDNUM' and USER_ID = '$USERID'";
    echo "$pricequery";
}

//sends the query to add quantity to the entry
$result = mysqli_query ($dbc, $sql); // Run the query.
?>
<?php
header("location:shoppingcart.php"); //redirect to shopping cart page
?>