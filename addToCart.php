<?php
session_start();
    //connect to server 
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'ics199greengrocerdb';

    $dbc = mysqli_connect($server,$user,$password,$db);


    $PRODUCT_ID = $_POST['PRODUCT_ID']; //Grabs data from form 
    $QUANTITY = $_POST['QUANTITY'];
    $user_id = $_SESSION['userid'];

    if($QUANTITY == ''){ //Default quantity set to 1 (from add to cart button)
      $QUANTITY = 1;
    }
    
  echo 'Here is some more debugging info:';

    //Changing user_id variable to the userID from DB instead of userName from login
    $sql= "SELECT * FROM users WHERE User_name='$user_id'";
    $result1 = mysqli_query ($dbc, $sql); // Run the query.	
    $row = mysqli_fetch_array($result1);
    $user_id = $row['USER_ID'];
   
    
// Select everything in shoppingcart table with matching userID
    $sql2= "SELECT * FROM shopping_cart WHERE USER_ID ='$user_id'";
    $result2 = mysqli_query ($dbc, $sql2);
    $row1 = mysqli_fetch_array($result2);
    $duplicate_id = $row1['PRODUCT_ID'];
    $oldQuan = $row1['Quantity_Product'];

//Dont display the same item twice 
    if($duplicate_id != $PRODUCT_ID){
    while($row1 = $result2->fetch_assoc()) {
    $duplicate_id = $row1['PRODUCT_ID'];
    $oldQuan = $row1['Quantity_Product'];
    
    if($duplicate_id == $PRODUCT_ID) break;
    
    }
  }
 
//If item is already in the shoppingcart table add quantities   
if($PRODUCT_ID == $duplicate_id){
  $newQuantity = $QUANTITY + $oldQuan;
  $sql= "UPDATE shopping_cart
         SET Quantity_Product = '$newQuantity'
         WHERE PRODUCT_ID = '$PRODUCT_ID'";

         $run = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
        
}else{ 
  //if not a duplicate item add it to the shopping cart table

    $sql= "INSERT INTO shopping_cart (PRODUCT_ID, USER_ID, QUANTITY_PRODUCT) 
  VALUES ('$PRODUCT_ID','$user_id', '$QUANTITY')";
    //Runs the insert statment or dies in an error
  $run = mysqli_query($dbc,$sql) or die(mysqli_error($dbc));
}
    
  //Notification that item was added successfully
  echo '<script> alert("Item added to your cart!"); </script>';
  
  
  //redirect to store 
  header("location:store.php");
?>
