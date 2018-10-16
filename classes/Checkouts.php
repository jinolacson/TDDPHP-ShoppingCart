<?php 

/**
 * Checkout Class
 */

//Declare namespace classes
namespace Classes;

use Classes\Carts;
use Interfaces\DISCOUNT;

class Checkouts implements DISCOUNT
{
    /**
     * checkout instance variable
     *
     * @var [type]
     */
    private $checkout;

    /**
     * return variales for total discounted item
     *
     * @var integer
     */
    private $discountedItems = 0;

    /**
     * total discounted item
     *
     * @var [type]
     */
    public $discountedPrice;
    
    public function __construct(Carts $checkout)
    {
        $this->checkout = $checkout;
    }

    /**
     * return total items that matches or greater than 2 items in cart
     *
     * @return integer
     * access public
     */
    public function validItemsDiscount() : int
    {
        return count($this->checkout->getCartItems()) >= DISCOUNT::validItemsDiscount;
    }

    /**
     * return total original price
     *
     * @return integer
     * access public
     */
    public function originalPrice() : int
    {
        return $this->checkout->getTotalItems() > 0 ? $this->checkout->getTotalItems() : 0;
    }

    /**
     * format remove trailing commas in price
     *
     * @param integer $price = original price
     * @return integer|null
     * access public
     */
    public function removePriceComma($price = 0) :? int
    {
        return str_replace(',', '', $price);
    }

    /**
     * apply discount for items
     *
     * @param boolean $apply = boolean true or false
     * @return float
     * access public
     */
    public function applyDiscount($apply = false) : float
    {
        switch ($apply) {
            case true:

                $discountedPrice = $this->removePriceComma($this->originalPrice()) - DISCOUNT::percent;
           
            break;

            case false:

                $discountedPrice = $this->originalPrice() ;

            break;

        }
        return  $discountedPrice;
    }

    /**
     * get discounted total price
     *
     * @return integer
     * access public
     */
    public function getDiscount() : int
    {
        if ($this->validItemsDiscount()) {
            $this->discountedItems = $this->applyDiscount(true);
        } else {
            $this->discountedItems = $this->applyDiscount(false);
        }

        return $this->discountedItems;
    }
    /**
     * Price details for both discounted and original price
     *
     * @return void
     * access public
     */
    public function checkoutPriceDetails() :? array
    {
        return [
            'discounted_price' => $this->getDiscount(),
            'original_price'   => $this->originalPrice()
        ];
    }

    /**
     * return cart items
     *
     * @return array|null
     * access public
     */
    public function checkoutItemsDetails() :? array
    {
        return $this->checkout->getCartItems();
    }
}
