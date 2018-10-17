<?php
require __DIR__ .'/vendor/autoload.php';

//load classes
use Classes\Products;
use Classes\Carts;
use Classes\Checkouts;

session_start();

//inject dependecies
$chk = new Checkouts(new Carts(new Products()));

//print checkout details including discouted price
echo "<pre>";
print_r($chk->getDiscount()); echo "<br>";echo "<br>";
print_r($chk->checkoutPriceDetails()); echo "<br>";
print_r($chk->checkoutItemsDetails()); echo "<br>";


