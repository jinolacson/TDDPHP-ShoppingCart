<?php 
/**
 * Carts Class
 */
use AbsContract\AbstractCarts;
use Classes\Products;
use InterfaceContract\CART;

class Carts extends AbstractCarts implements CART
{
    /**
     * product variable
     *
     * @var string
     */
    protected static $products;

    /**
     * carts array
     *
     * @var array
     */
    protected static $cart_items = [];

    /**
     * item code
     *
     * @var integer
     */
    protected static $item_id = 0;

    public function __construct()
    {
        //instantiate Product Object
        self::$products = new Products();
    }

    /**
     * set items to cart
     *
     * @return void
     * access public
     */
    public function setCartItems($item_code = null)
    {
        if (is_null($item_code) || !is_numeric($item_code)) {
            return false;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $this->setItemCode($item_code);
        $this->setCartSessionItems();
        
    }

    public function setCartSessionItems()
    {
        $_SESSION['cart'][$this->getItemCode()] =[
            CART::ID => $this->getId(),
            CART::QUANTITY => $this->getQuantity(),
            CART::NAME => $this->getName(),
            CART::PRICE =>  $this->getprice()
        ];
    }

    /**
     * set item code
     *
     * @param int $item_code
     * @return void
     * access private
     */
    public function setItemCode($item_code = null)
    {
        self::$item_id = $item_code;
    }

    /**
     * return item code
     *
     * @return integer
     * access private
     */
    public function getItemCode(): int
    {
        return self::$item_id;
    }

    /**
     * setter for item code
     *
     * @return string|null
     * access public
     */
    public function getId() : ?string
    {
        return self::$products::searchProductCode($this->getItemCode())[CART::ID];
    }

    /**
     * setter for quantity
     *
     * @return string|null
     * access public
     */
    public function getQuantity() : ?string
    {
        return self::$products::searchProductCode($this->getItemCode())[CART::QUANTITY];
    }

    /**
     * setter for name
     *
     * @return string|null
     * acces public
     */
    public function getName() : ?string
    {
        return self::$products::searchProductCode($this->getItemCode())[CART::NAME];
    }

    /**
     * setter for price
     *
     * @return string|null
     * acces public
     */
    public function getPrice() : ?string
    {
        return self::$products::searchProductCode($this->getItemCode())[CART::PRICE];
    }

    /**
     * return added products to cart
     *
     * @return array
     * access public
     */
    public function getCartItems() : array
    {
        return $_SESSION['cart'] ?? [];
    }

    /**
     * get total items in cart
     *
     * @return void
     * access public
     */
    public function getTotalItems()
    {
        $total_items = 0;
        foreach ($this->getCartItems() as $key => $items) {
            $total_items += (int)self::$products::searchProductCode($items[CART::ID])[CART::PRICE];
        }

        return $total_items > 0 ? number_format($total_items, 2, '.', ',') : 0;
    }

    /**
     * delete items from cart
     *
     * @param int $item_code
     * @return void
     */
    public function removeCartItems($item_code = null)
    {
        if (is_null($item_code) || !is_numeric($item_code)) {
            return false;
        }

        unset($_SESSION['cart'][$item_code]);
    }

    /**
     * destroy cart
     *
     * @return void
     * access public
     */
    public function destroyCartSession()
    {
        unset($_SESSION['cart']);
    }

    /**
     * check if getters are properly set according to its type
     *
     * @param int $item_codes
     * @param string $type
     * @return void
     * access public
     */
    public static function checkVariables($item_codes = null,$type = null)
    {
        if(is_null($item_codes) && is_null($type))
        {
            return false;
        }

        return self::$products::searchProductCode($item_codes)[$type];
    }
}
