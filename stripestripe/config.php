<?php
require_once('./vendor/autoload.php');

$stripe = [
  "secret_key"      => "sk_test_51IylgQGngGsX4ykQn4X5eFeOYX4JWOxNkB3hyjrDyZHKaglo857JfyVdxq5CnzXTtmNFHPYiedPb7FLYomudQeTp00OEg3DeXw",
  "publishable_key" => "pk_test_51IylgQGngGsX4ykQFXxRFJ4UtaeTIytMs0BLuoLwRU05WInvYSVh9Hq8cUZwFhCYXaedcXaWho7T2jS94TSbgel600QiRHCSJp",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>