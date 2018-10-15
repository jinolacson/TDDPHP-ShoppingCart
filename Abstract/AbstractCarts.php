<?php
declare(strict_types=1);

namespace Abstracts;

abstract class AbstractCarts
{
    abstract function setCartItems();
    abstract function getId();
    abstract function getQuantity();
    abstract function getName();
    abstract function getPrice() ;
    abstract function getCartItems();
    abstract function destroyCartSession();

}