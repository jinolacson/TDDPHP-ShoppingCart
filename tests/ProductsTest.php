<?php
declare(strict_types=1);

//use class Products
use Classes\Products;
use PHPUnit\Framework\TestCase;

/**
 * ProductsTest
 * @group products
 */
class ProductsTest extends TestCase
{
    /**
     * @var string
     */

    private static $prod;

    protected function setUp()
    {
        //instantiate object Products;
        self::$prod = new Products();
    }
    
    /**
     * Test for Null products list
     *
     * @return void
     * access public
     */
    public function testContainsVariables()
    {
        $this->assertNotNull(self::$prod::readProducts());
    }

    /**
     * Test type should be array of products
     *
     * @return void
     * access public
     */
    public function testType()
    {
        $this->assertInternalType('array', self::$prod::readProducts());
    }

    /**
     * Product(s) Should not empty
     *
     * @return void
     * access public
     */
    public function testNotEmptyProducts()
    {
        $this->assertTrue(!empty(self::$prod::getTotalProducts()));
    }

    /**
     * Check if product is empty
     *
     * @return void
     * access public
     */
    public function testEmpty()
    {
        $this->assertEmpty(self::$prod::isEmpty());
    }
 
    public function testGetListProducts()
    {
        $item_codes = [101,102,103,104,105];
        $this->assertTrue(!empty($item_codes));

        return $item_codes;
    }

    /**
     * @depends testGetListProducts
     */
    public function testMatchPrice($item_codes)
    {
        foreach ($item_codes as $item) {
            $this->assertTrue(!empty(self::$prod::searchProductCode($item)));
        }
    }

    /**
     * Stop executing parent file
     *
     * @return void
     * access protected
     */
    protected function tearDown()
    {
        parent::tearDown();
    }
}
