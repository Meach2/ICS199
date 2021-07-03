<?php
if ($_SESSION['total'] > 0) {
  echo "
<form action='stripe-charge.php' method='POST'>
  <script
    src='https://checkout.stripe.com/checkout.js'
    class='stripe-button'
    data-key='pk_test_51IylgQGngGsX4ykQFXxRFJ4UtaeTIytMs0BLuoLwRU05WInvYSVh9Hq8cUZwFhCYXaedcXaWho7T2jS94TSbgel600QiRHCSJp'
    data-name='Grocery Bill'
    data-description='From Green Grocer'
    data-amount=" . $_SESSION['total']*100 . "
    data-currency='cad'>
  </script>
  <input type='hidden' name='totalamt' value=" . $_SESSION['total']*100 . " />
</form>
";
}
?>
      </div>
    </footer>

  </section>
</div>

