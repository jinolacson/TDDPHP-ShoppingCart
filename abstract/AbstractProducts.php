<?php 
declare(strict_types=1);

namespace Abstracts;

abstract class AbstractProducts
{
    abstract static function addProducts($options = array());
    abstract static function productLists();
    abstract static function readProducts();
    abstract static function getProducts();
    abstract static function isEmpty();
    abstract static function getTotalProducts();
}