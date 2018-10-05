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
    private $products = [];

    /**
     * Unique index id
     *
     * @var integer
     */
    protected $id = 0;
    
    /**
     * Name of product
     *
     * @var [type]
     */
    protected $name;
    
    /**
     * Product price
     *
     * @var integer
     */
    protected $price = 0;

    /**
     * Product quantity
     *
     * @var integer
     */
    protected $quantity = 0;

    public function __construct()
    {
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
    public function addProducts($id, $quantity, $options = [])
    {
        if (isset($id) && is_numeric($id)) {
            $this->id = $id;
        }

        if (isset($quantity) && is_numeric($quantity)) {
            $this->quantity = $quantity;
        }

        if (isset($options['name'])) {
            $this->name = $options['name'];
        }
        
        if (isset($options['price']) && preg_match('/^\d+$/', $options['price'])) {
            $this->price = $options['price'];
        }

        $this->productLists();
    }

    /**
     * Add new Product to temporary
     *
     * @return void
     */
    private function productLists()
    {
        array_push($this->products, [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity
        ]);
    }

    /**
     * Read products
     *
     * @return void
     */
    public function readProducts()
    {
        echo "<pre>";
        print_r($this->getProducts());
    }

    /**
     * return product lists
     *
     * @return void
     */
    public function getProducts()
    {
        return count($this->products) > 0 ? $this->products : null;
    }

    /**
     * Check empty products
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return empty(array_filter($this->products));
    }
    
    /**
     * Display total Products
     *
     * @return void
     */
    public function getTotalProducts()
    {
        return count($this->products);
    }
}

$product = new Products();

$product->addproducts(1, 1, [
    'name' => "Mouse",
    'price' => '100'
]);

$product->addproducts(2, 3, [
    'name' => "Keyboard",
    'price' => '250'
]);

$product->addproducts(3, 6, [
    'name' => "Monitor",
    'price' => '8000'
]);

$product->addproducts(4, 6, [
    'name' => "Chair",
    'price' => '6000'
]);

$product->addproducts(5, 6, [
    'name' => "Avr",
    'price' => '6000'
]);

//$product->readProducts();
//$product->getTotalProducts();

?>


