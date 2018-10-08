<?php 
/**
 * Product Class
 */

 declare(strict_types=1);

class Products
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
            'id' => 1,
            'quantity' => 10,
            'name' => "Mouse",
            'price' => 100
        ]);

        self::addproducts([
            'id' => 2,
            'quantity' => 10,
            'name' => "Keyboard",
            'price' => 250
        ]);

        self::addproducts([
            'id' => 3,
            'quantity' => 10,
            'name' => "Monitor",
            'price' => 8000
        ]);

        self::addproducts([
            'id' => 4,
            'quantity' => 10,
            'name' => "Chair",
            'price' => 6000
        ]);

        self::addproducts([
            'id' => 5,
            'quantity' => 10,
            'name' => "Avr",
            'price' => 6000
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
        if (isset($options['id']) && is_numeric($options['id'])) {
            self::$id = $options['id'];
        }

        if (isset($options['quantity']) && is_numeric($options['quantity'])) {
            self::$quantity = $options['quantity'];
        }

        if (isset($options['name'])) {
            self::$name = $options['name'];
        }
        
        if (isset($options['price']) &&   is_numeric($options['price']) ) {
            self::$price = $options['price'];
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
            'id' => self::$id,
            'name' => self::$name,
            'price' => self::$price,
            'quantity' => self::$quantity
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
}
?>


