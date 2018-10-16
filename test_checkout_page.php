<?php
require __DIR__ .'/vendor/autoload.php';

use Classes\Products;
use Classes\Carts;
use Classes\Checkouts;


session_start();

$chk = new Checkouts(new Carts(new Products()));


echo "<pre>";
print_r($chk->getDiscount()); echo "<br>";echo "<br>";
print_r($chk->checkoutPriceDetails()); echo "<br>";
print_r($chk->checkoutItemsDetails()); echo "<br>";


