
<?php include "header.php";
?>

<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'ics199greengrocerdb';

//create connection
$conn = new mysqli($server,$user,$password,$db);

//Check Connection 
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
$User_name = $_SESSION['userid'];




$sql1 = "SELECT * FROM users WHERE User_name = '$User_name'";
$result1 = $conn->query($sql1); // Run the query.	
$row = mysqli_fetch_array($result1);
$User_id = $row['USER_ID'];



echo " <table style= 'width:50%; margin-left:auto;  margin-right:auto';>
            <tr>
                <th>Product Name:</th>
                <th>Product Price:</th>
                <th>Quantity:</th>
                <th></th>
                <th></th>
                <th>Delete?</th>
              
            </tr>
            ";
            
             
            $sql = "SELECT * FROM shopping_cart WHERE USER_ID = '$User_id'";
            $result = $conn->query($sql);
            //$row = mysqli_fetch_array($result);
            //$row_price = mysqli_fetch_array($result4);
            // work plz
            
            $subTotal = 0; 
            echo' 
            <h1>Shopping cart</h1>
            <h2 class="sub-heading">Free shipping from $100!</h2> 
            ';
if ($result->num_rows > 0) {
  
    //output data from each row
    while($row = $result->fetch_assoc()) {
      $IDNUM = $row['PRODUCT_ID'];
      $itemQuantity = $row['Quantity_Product'];

      $sql1 = "SELECT * FROM product WHERE product_id = '$IDNUM'";
      $result1 = $conn->query($sql1);

      while($row = $result1->fetch_assoc()) {
      $itemPrice = $row['Price_Product'];
      $itemTotal = (int)$itemPrice * (int)$itemQuantity;
      $subTotal = $subTotal + $itemTotal;
    
      $itemName = $row['Name_Product'];

      }


        echo "
        
        <tr>
        <td style ='width:30%'>" . $itemName . "</td>
        <td style ='width:30%'>$" . number_format($itemPrice, 2) . "</td>
        <td style ='width:1%'><form action='addQuantity.php' method='POST'><input type='text' name='addQuantity' value='" . $IDNUM . "' style='display: none;'><input type='submit' name='plus' value='+'></form></td>
        <td style ='width:3%'>" . $itemQuantity . " </td>
        <td style ='width:20%'><form action='lessQuantity.php' method='POST'><input type='text' name='addQuantity' value='" . $IDNUM . "' style='display: none;'><input type='submit' name='minus' value='-'></form></td>
        
        <td><form action='delete.php' method='POST'><input type='text' name='delete' value='" . $IDNUM . "' style='display: none;'><input type='submit' name='remove' value='Remove'></form></td>
      </tr>
      "
      ;
      
                //delete button above
    }
    
    //DELETE FROM table_name WHERE condition;
}   else{
    echo "<h1>0 Results</h1>";
}

?>
</table>




<link href="css/style.css" rel="stylesheet" />
<div class="main">
  

  <section class="shopping-cart">
    <ol class="ui-list shopping-cart--list" id="shopping-cart--list">

      <script id="shopping-cart--list-item-template" type="text/template">
        <li class="_grid shopping-cart--list-item">
          <div class="_column product-image">
            <img class="product-image--img" src="{{=img}}" alt="Item image" />
          </div>
          <div class="_column product-info">
            <h4 class="product-name">{{=name}}</h4>
            <p class="product-desc">{{=desc}}</p>
            <div class="price product-single-price">${{=price}}</div>
          </div>
          <div class="_column product-modifiers" data-product-price="{{=price}}">
            <div class="_grid">
              <button class="_btn _column product-subtract">&minus;</button>
              <div class="_column product-qty">0</div>
              <button class="_btn _column product-plus">&plus;</button>
            </div>
            <button class="_btn entypo-trash product-remove">Remove</button>
            <div class="price product-total-price">$0.00</div>
          </div>
        </li>
      </script>

    </ol>
    <?php
    
      if($subTotal > 100 || $subTotal == 0){
        $shipping = 0.00;
      } else{
        $shipping = 15.00;
      }
      $taxes = $subTotal * .06;
      $total = $subTotal + $shipping + $taxes;
      $_SESSION['total'] = $total;
      ?>

    <footer class="_grid cart-totals">
      <div class="_column subtotal" id="subtotalCtr">
        <div class="cart-totals-key">Subtotal</div>
        <div class="cart-totals-value">$<?php echo number_format($subTotal, 2); ?></div>
      </div>
      <div class="_column shipping" id="shippingCtr">
        <div class="cart-totals-key">Shipping</div>
        <div class="cart-totals-value">$<?php echo number_format($shipping, 2); ?></div>
      </div>
      <div class="_column taxes" id="taxesCtr">
        <div class="cart-totals-key">Taxes (6%)</div>
        <div class="cart-totals-value">$<?php echo number_format($taxes, 2); ?></div>
      </div>
      <div class="_column total" id="totalCtr">
        <div class="cart-totals-key">Total</div>
        <div class="cart-totals-value">$<?php echo number_format($total, 2) ?></div>
      </div>
      <div class="_column checkout">
      <!-- this is FOR STRIPE -->

      <?php include "stripe_popup.php"; ?>
      </div>

<script src="myscripts.js"></script>

<?php include "footer.php";
?>