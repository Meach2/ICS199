<?php
  
   $total = 100.00;
   echo "<h3>The test total is: ".$total."</h3>";
?>

<form action="shoppingcart-charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="pk_test_51IylgQGngGsX4ykQFXxRFJ4UtaeTIytMs0BLuoLwRU05WInvYSVh9Hq8cUZwFhCYXaedcXaWho7T2jS94TSbgel600QiRHCSJp"
          data-description="<?php echo 'Payment Checkout'; ?>"
          data-amount="<?php echo $total*100; ?>"
          data-locale="auto"></script>
	      <input type="hidden" name="totalamt" value="<?php echo $total*100; ?>" />
</form>



