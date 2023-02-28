<?php 
require_once 'stripe-php/init.php';
require_once 'database.php';
require_once 'function.php';

define('STRIPE_API_KEY','sk_test_51Mg7sZH22UcLljNMumc2FnMl8Fo5nAwLkNgKqmypmily98pKpyhF5aqRuzbEdEH9YzOiNg4iLgHmNcFpsgq1BFk100CDkGPovO');
define('STRIPE_PUBLISHABLE_KEY','pk_test_51Mg7sZH22UcLljNMPb2333em4qBt395vgfctxDh9f8Ec5ZpdfQCRgiIDvlx8jn4YoFgiCggrln3667t3NkXJw55o00rVtvP3ar');
define('STRIPE_SUCCESS_URL','http://localhost/TD-EVAL/payment-success.php');
define('STRIPE_CANCEL_URL','http://localhost/TD-EVAL/payment-cancel.php');
?>