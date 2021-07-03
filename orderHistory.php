
<?php include "header.php";
?>


<?php
//session_start();
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'ics199greengrocerdb';
    $user_id = $_SESSION['userid'];

    //create connection
    $dbc = mysqli_connect($server,$user,$password,$db);


    echo " 
    <link href='css/style.css' rel='stylesheet' />
    <table style= 'width:60%; margin-left:auto;  margin-right:auto';>
    <tr>
        <th style ='width:20%'>Order: </th>
        <th style ='width:20%'>Total: </th>
        <th style ='width:20%'>Product Name:</th>
        <th style ='width:10%'>Price:</th>
        <th style ='width:10%'>Quantity:</th>
        <th style ='width:25%'>Order Date:</th>
        <th></th>
        
      
    </tr>
    ";

     
    //SWITCH SESSION VARIABLE TO USERID FROM DATABASE
    $sql= "SELECT * FROM users WHERE User_name='$user_id'";
    $result1 = mysqli_query ($dbc, $sql); // Run the query.	
    $row = mysqli_fetch_array($result1);
    $user_id = $row['USER_ID'];

    //Select count of orders 
    $sql= " SELECT COUNT(ORDER_ID)
            FROM order_history
            WHERE USER_ID = '$user_id'";
    $result1 = mysqli_query ($dbc, $sql); // Run the query.	
    $row = mysqli_fetch_array($result1);
    $numberOfOrders = $row['COUNT(ORDER_ID)'];

        //SELECT ALL FROM 

    $sql = "SELECT * FROM order_history 
            WHERE USER_ID = '$user_id'
            ORDER BY DATE_ORDER DESC";	
    $result1 = mysqli_query ($dbc, $sql);
    //$row = mysqli_fetch_array($result1); // Run the query.	
   // echo $user_id;
    $lastOrder = 0;
    $orderTotal = 0;
    while($row = $result1->fetch_assoc()) {
        //echo $row['ORDER_ID'] . "<br>";
        $orderID = $row['ORDER_ID'];
        $orderDate = $row['Date_Order'];
     
        
        $sql2 = "SELECT * FROM order_specifics 
            WHERE ORDER_ID = '$orderID'";	
        $result2 = mysqli_query ($dbc, $sql2);
        //$row2 = mysqli_fetch_array($result2);
    

    while($row2 = $result2->fetch_assoc()) {
        $itemID = $row2['PRODUCT_ID'];
        $itemQuantity = $row2['Product_Quantity'];
       //echo $itemID . 'help';
        $sql3 = "SELECT * FROM product 
        WHERE PRODUCT_ID = '$itemID'";	
        $result3 = mysqli_query ($dbc, $sql3);
        
        while($row3 = $result3->fetch_array()) {

            $itemName = $row3['Name_Product'];
            $itemPrice = $row3['Price_Product'];
            
        }
        
        echo "
        
        <tr>"; 
        if($orderID != $lastOrder){
            echo "<td style ='width:10%'>" . $numberOfOrders . " </td>";
            
            $sql= " SELECT * 
                    FROM order_specifics
                    WHERE ORDER_ID = '$orderID'";
            $result99 = mysqli_query ($dbc, $sql); // Run the query.	
            
            
            while($totalRow = $result99->fetch_array()) {

                $orderItemPrice = $totalRow['Price_Items'];
                $orderItemQuantity = $totalRow['Product_Quantity'];
                $orderTotal = $orderTotal + $orderItemPrice * $orderItemQuantity;
            };
            if($orderTotal < 100){
                $orderTotal = $orderTotal + 15;
            }
            $orderTotal = $orderTotal * 1.06;
            echo "<td style ='width:10%'>$" . number_format($orderTotal, 2) . " </td>";
            
            $numberOfOrders--;
          #  $lastOrder = $orderID;
            $orderTotal = 0;
        }
        else{
            echo "<td style ='width:10%'>" . " </td>";
            echo "<td style ='width:10%'>" . " </td>";
        }
        
        echo "
        <td style ='width:10%'>" . $itemName . "</td>
        <td style ='width:10%'>$" . number_format($itemPrice, 2) . "</td>
        <td style ='width:10%'>" . $itemQuantity . " </td>";
        
        if($orderID != $lastOrder){
            echo "<td style ='width:10%'>" . $orderDate . " </td>";
            $lastOrder = $orderID;
        }
        else{
            echo "<td style ='width:10%'>" . " </td>";
        }
        
      echo "</tr>";
      
    }
   

    } 

   
            

    

?>

<?php include "footer.php";
?>