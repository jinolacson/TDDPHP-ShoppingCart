<?php 
declare(strict_types=1);

namespace Interfaces;

interface DISCOUNT
{
    const percent  = 50;
    const validItemsDiscount  = 2;

    public function validItemsDiscount() : int;
    public function removePriceComma($price = 0) :? int;
    public function applyDiscount()  : float;
    public function getDiscount() : int;
    public function checkoutPriceDetails() :? array;
    public function checkoutItemsDetails() :? array;
}