<link href='css/style.css' rel='stylesheet' />
<?php
//session_start();
    //connect to server 
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'ics199greengrocerdb';

    $dbc = mysqli_connect($server,$user,$password,$db);

    $user_id = $_SESSION['userid'];
    date_default_timezone_set("America/Vancouver");

    //TESTING SESSION VARIABLE 
    //echo "session variable userid = " . $user_id . "<br>";
    $todayDate = date("d/m/y h:i:sa");
    //TESTING DATE OUTPUT
    //echo "date for input = " . $todayDate . "<br>";
    

    // BELOW TO CHANGE USER NAME FROM SESSION VARIABLE TO USER ID_NUM
    $sql= "SELECT * FROM users WHERE User_name='$user_id'";
    $result1 = mysqli_query ($dbc, $sql); // Run the query.	
    $row = mysqli_fetch_array($result1);
    $user_id = $row['USER_ID'];
    
    //testing userID after output
   //echo "Updated from database user ID = " . $user_id . "<br>";

    // INSERT INTO ORDER HISTORY
    $sql= "INSERT INTO order_history (ORDER_ID, USER_ID, STATUS_ORDER, Date_Order) 
           VALUES (NEXT VALUE FOR order_id_sequence,'$user_id', 'COMPLETED', '$todayDate')";
    $result1 = mysqli_query ($dbc, $sql); // Run the query.	

    //TEST TO SEE SQL FOR INSERT
    //echo "SQL FOR INSERT INTO ORDER HISTORY! = " . $sql . "<br>";

    // TAKE THE HIGHEST ORDER_ID WHICH WILL BE MOST RECENTLY ADDED
    $sql= "SELECT MAX(CAST(ORDER_ID AS INT))
           FROM order_history";
    $result1 = mysqli_query ($dbc, $sql); // Run the query.	
    $row = mysqli_fetch_array($result1);
    $highestOrder = $row['MAX(CAST(ORDER_ID AS INT))'];
    
    //SELECT ALL FROM SHOPPING CART MATCHING USER_ID
    $sql= "SELECT * FROM shopping_cart WHERE USER_ID ='$user_id'";
    $result1 = mysqli_query ($dbc, $sql); // Run the query.	
    //$row6 = mysqli_fetch_array($result1);


    $Countit = 1;
    //TAKE RESULTS FROM ABOVE AND START WHILE LOOP
    while($row6 = $result1->fetch_assoc()) {
        //echo "    TESTING     " . $Countit . "<br><br><br><br><br><br>";
        $Countit++;
        //SELECT ALL FROM PRODUCTS WITH MATCHING PRODUCT ID
        $newProductID = $row6['PRODUCT_ID'];
        $sql3 = "SELECT * FROM PRODUCT WHERE product_id = '$newProductID'";
        $result2 = mysqli_query ($dbc, $sql3);
        $row2 = mysqli_fetch_array($result2);
        
        $productPrice = $row2['Price_Product'];
        $productQuantity = $row6['Quantity_Product'];
        //INSERT INTO ORDER SPECIFICS THE DATA FROM SHOPPING CART AND PRICE FROM PRODUCT TABLE WITH HIGHEST ORDERID
        $sql2= "INSERT INTO order_specifics (ORDER_ID, PRODUCT_ID, Price_Items, Product_Quantity) 
        VALUES ('$highestOrder','$newProductID', '$productPrice', ' $productQuantity')";
        $result3 = mysqli_query ($dbc, $sql2); // Run the query.
        $_SESSION['orderID'] = $highestOrder;
    }

    //delete all from shopping cart where User_Id matches
    $sql= "DELETE FROM shopping_cart WHERE USER_ID ='$user_id'";
    $result1 = mysqli_query ($dbc, $sql); // Run the query.	
    
   // header("Location: shoppingcart.php");
  
  ?>