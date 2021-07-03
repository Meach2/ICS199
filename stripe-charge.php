<?php
date_default_timezone_set("America/Vancouver");
 
  require_once('./config.php');

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];
   
  $amount = (int)$_POST['totalamt'] ;
  
  // echo "Total amt: $totalamt";
  $customer = \Stripe\Customer::create([
    'email' => $email,
    'source' => $_POST['stripeToken'],
  ]);
  
  $charge = \Stripe\Charge::create([
    'customer' => $customer->id,
    'description' => 'From Green Grocer',
    'amount' => $amount,
    'currency' => 'cad',
  ]);
  $amount = number_format(($amount / 100), 2);
  
  

?>
<?php include 'header.php' ; 

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'ics199greengrocerdb';

$dbc = mysqli_connect($server,$user,$password,$db);


/*
echo '<h3>Successfully charged $'.$amount.' </h3>Thank you for shopping at Green Grocer!';
$user_name = $_SESSION['userid'];
// echo $user_id;
*/
//this gets the current user's user ID
// this is actually needed here, so leave this uncommented.
$User_name = $_SESSION['userid'];
$step1 = "SELECT user_id FROM users WHERE User_name LIKE '$User_name'";
$step2 = mysqli_query ($dbc, $step1);
$row = mysqli_fetch_array($step2);
$User_id = $row['user_id'];
//echo $user_id;
// user ID is good and so is user name at this point... if you need to pull user name use the confusing session variable 'userid'.  $user_id is user id... ahahaha
/*
 // <--- Ok it's getting the right row... now need to get ID's.
$step1 = "SELECT PRODUCT_ID FROM shopping_cart WHERE USER_ID LIKE '$user_id'";
$step2 = mysqli_query ($dbc, $step1);
$row = mysqli_fetch_array($step2);
$prodyids = $row['PRODUCT_ID'];

//echo $prodyids; <--- seems to be working???  it gave me "1" so its at least getting something.

// now I need to pull the rows for the items that are in the shopping cart for the user somehow?
// I'll pull the quantities first.
$step1 = "SELECT Quantity_Product FROM shopping_cart WHERE USER_ID LIKE '$user_id'";
$step2 = mysqli_query ($dbc, $step1);
$row = mysqli_fetch_array($step2);
$quantys = $row['Quantity_Product'];

//echo $quantys; <---- got the quantity row, no errors up to here...
//Time to get the name of the products....

$step1 = "SELECT Name_Product FROM product WHERE PRODUCT_ID LIKE '$prodyids'";
$step2 = mysqli_query ($dbc, $step1);
$row = mysqli_fetch_array($step2);
$prodynames = $row['Name_Product'];
// echo $prodynames; <--- This works, product name appears.
// So at this point we have the name, price, quantity, id's, user id.
// Somehow, I need to loop through this and then echo it to the screen and the file.
// Hmmmm.....................

*/

$sql = "SELECT * FROM shopping_cart WHERE USER_ID = '$User_id'";
            $result = $dbc->query($sql);

            $sql1 = "SELECT * FROM users WHERE User_name = '$User_name'";
$result1 = $dbc->query($sql1); // Run the query.	
$row = mysqli_fetch_array($result1);
$User_id = $row['USER_ID'];
$txt = "----------------------------------------------------------------------------------------------<br>";
?>
<?php include 'addToHistory.php' ?>
<?php
$txt2 = "\n";
if ($result->num_rows > 0) {
  
  //output data from each row
  
  while($row = $result->fetch_assoc()) {
    $IDNUM = $row['PRODUCT_ID'];
    $itemQuantity = $row['Quantity_Product'];

    $sql1 = "SELECT * FROM product WHERE product_id = '$IDNUM'";
    $result1 = $dbc->query($sql1);

    while($row = $result1->fetch_assoc()) {
    $itemPrice = $row['Price_Product'];
    $itemTotal = (int)$itemPrice * (int)$itemQuantity;
    
    $itemName = $row['Name_Product'];
    // this one is for displaying on the page
      $shorttxt = $itemName . ".  $" . $itemPrice . " X " . $itemQuantity . "   Item Total: $" . $itemPrice * $itemQuantity . " \n<BR>";
      $txt = $txt . $shorttxt;
      // this one is for writing to file
      $shorttxt2 = $itemName . ".  $" . $itemPrice . " X " . $itemQuantity . "   Item Total: $" . $itemPrice * $itemQuantity . " \n";
      $txt2 = $txt2 . $shorttxt2;
    }
  }
}
    
    // THIS IS WHERE IT WRITES TO FILE
    $new_order_name = 'order_' . $_SESSION['userid'] . '_' . date('Y-m-d-H-i-s') . '_' . $_SESSION['orderID'] . '.txt';
  
$myfile = fopen($new_order_name, "a") or die("Unable to open file!");
$txt = $txt . "<br>\nHello, " . $_SESSION['userid'] . " at " . $email . ". Your total dollar amount for this order is $" . $amount . "<br><br>----------------------------------------------------------------------------------------------";

$txt2 = $txt2 . "\nHello, " . $_SESSION['userid'] . " at " . $email . ". Your total dollar amount for this order is $" . $amount . "\n\n----------------------------------------------------------------------------------------------";
echo $txt;
fwrite($myfile, $txt2);
fclose($myfile);




/**************************************DO STUFF DOWN HERE **************************/
?>




<?php include 'footer.php' ; ?> 
