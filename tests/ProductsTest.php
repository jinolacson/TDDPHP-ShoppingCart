<?php

declare(strict_types=1);

include_once './classes/Products.php';

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

    private static $prod = "";

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
        $this->assertNull(self::$prod::readProducts());
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
     * Product count it should be 5 products only
     *
     * @return void
     * access public
     */
    public function testCountProducts()
    {
        $this->assertCount(5, count(self::$prod::getProducts()));
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
}
