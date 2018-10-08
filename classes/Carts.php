<?php 
/**
 * Carts Class
 */

require_once 'Products.php';
require_once 'Abstract_carts.php';

class Carts extends Abstract_carts
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

    public function __construct($item_code = null)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        //instantiate Product Object
        self::$products = new Products();

        //set item code
        self::$item_id = $item_code;

        //set new item(s)
        $this->setCartItems();
    }

    /**
     * add items to cart
     *
     * @return void
     * access public
     */
    public function setCartItems()
    {
        if (is_null(self::$item_id) || !is_numeric(self::$item_id)) {
            return false;
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $_SESSION['cart'][self::$item_id] =
        [
            'id' => $this->getId(),
            'quantity' => $this->getQuantity(),
            'name' => $this->getName(),
            'price' =>  $this->getprice()
        ];
    }

    /**
     * setter for item code
     *
     * @return string|null
     * access public
     */
    public function getId() : ?string
    {
        return self::$products::searchProductCode(self::$item_id)['id'];
    }

    /**
     * setter for quantity
     *
     * @return string|null
     * access public
     */
    public function getQuantity() : ?string
    {
        return self::$products::searchProductCode(self::$item_id)['quantity'];
    }

    /**
     * setter for name
     *
     * @return string|null
     * acces public
     */
    public function getName() : ?string
    {
        return self::$products::searchProductCode(self::$item_id)['name'];
    }

    /**
     * setter for price
     *
     * @return string|null
     * acces public
     */
    public function getPrice() : ?string
    {
        return self::$products::searchProductCode(self::$item_id)['price'];
    }

    /**
     * retur added products to cart
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
            $total_items += (int)self::$products::searchProductCode($items['id'])['price'];
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
}
