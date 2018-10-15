<?php 
/**
 * Product Class
 */

//declare namespace classes
namespace Classes;

use AbsContract\AbstractProducts;
use InterfaceContract\CART;

class Products extends AbstractProducts implements CART
{
    /**
     * Collection of Products Lists
     *
     * @var array
     */
    protected static $products = [];

    /**
     * Unique index id
     *
     * @var integer
     */
    protected static $id = 0;
    
    /**
     * Name of product
     *
     * @var string
     */
    protected static $name;
    
    /**
     * Product price
     *
     * @var integer
     */
    protected static $price = 0;

    /**
     * Product quantity
     *
     * @var integer
     */
    protected static $quantity = 0;

    public function __construct()
    {
    
        self::addproducts([
            CART::ID => 101,
            CART::QUANTITY => 10,
            CART::NAME => "Mouse",
            CART::PRICE => 100
        ]);

        self::addproducts([
            CART::ID => 102,
            CART::QUANTITY => 10,
            CART::NAME => "Keyboard",
            CART::PRICE => 250
        ]);

        self::addproducts([
            CART::ID => 103,
            CART::QUANTITY => 10,
            CART::NAME => "Monitor",
            CART::PRICE => 8000
        ]);

        self::addproducts([
            CART::ID => 104,
            CART::QUANTITY => 10,
            CART::NAME => "Chair",
            CART::PRICE => 6000
        ]);

        self::addproducts([
            CART::ID => 105,
            CART::QUANTITY => 10,
            CART::NAME => "Avr",
            CART::PRICE => 6000
        ]);
    }
    /**
     * Add product
     *
     * @param int $id
     * @param int $quantity
     * @param array $options
     * @return void
     * access public
     */
    public static function addProducts($options = [])
    {
        if (isset($options[CART::ID]) && is_numeric($options[CART::ID])) {
            self::$id = $options[CART::ID];
        }

        if (isset($options[CART::QUANTITY]) && is_numeric($options[CART::QUANTITY])) {
            self::$quantity = $options[CART::QUANTITY];
        }

        if (isset($options[CART::NAME])) {
            self::$name = $options[CART::NAME];
        }
        
        if (isset($options[CART::PRICE]) &&   is_numeric($options[CART::PRICE]) ) {
            self::$price = $options[CART::PRICE];
        }

        self::productLists();
    }

    /**
     * Add new Product to temporary
     *
     * @return void
     */
    public static function productLists()
    {
        array_push(self::$products, 
        [
            CART::ID => self::$id,
            CART::NAME => self::$name,
            CART::PRICE => self::$price,
            CART::QUANTITY => self::$quantity
        ]);
    }

    /**
     * Read products
     *
     * @return void
     */
    public static function readProducts()
    {
        return self::getProducts();
    }

    /**
     * return product lists
     *
     * @return void
     */
    public static function getProducts()
    {
        return count(self::$products) > 0 ? self::$products : null;
    }

    /**
     * Check empty products
     *
     * @return boolean
     */
    public static function isEmpty()
    {
        return empty(array_filter(self::$products));
    }
    
    /**
     * Display total Products
     *
     * @return void
     */
    public static function getTotalProducts()
    {
        return count(self::$products);
    }

    /**
     * return product list by product code
     *
     * @param string $search
     * @return void
     * access public
     */
    public static function searchProductCode($search = null)
    {
        if (is_null($search) || !is_numeric($search)) {
            return false;
        }

        //check products if properly set
        $product_items = is_array(self::readProducts()) || is_object(self::readProducts()) ? self::readProducts() : null;

        foreach ($product_items as $key => $prods) {
            if ($prods[CART::ID] == trim($search)) {
                return ($prods);
            }
        }
    }
}
?>


