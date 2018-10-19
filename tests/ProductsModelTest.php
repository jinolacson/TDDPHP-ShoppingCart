<?php
/*
 * @Author: Jino Lacson
 * @Date: 2018-10-19 14:35:01
 * @Last Modified by: jlacson@wylog.com
 * @Last Modified time: 2018-10-19 16:01:10
 */

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

use Classes\Connection;
use Models\Products;

class ProductsTest extends TestCase
{
    use TestCaseTrait;
 
    private static $pdo = null;

    private static $database = null;
 
    private static $conn = null;

    private $products = null;
    
    public function setUp()
    {
        parent::setUp();
        self::$pdo = Connection::getNewConnection();
        self::$database = Connection::getDatabase();
        self::$conn = $this->createDefaultDBConnection(self::$pdo, self::$database);

        $this->products = new Products(self::$pdo);
    }

    final public function getConnection()
    {
        return self::$conn;
    }
    
    public function getDataSet()
    {
        return $this->createFlatXmlDataSet('./fixtures/products/products_fixture.xml')->getTable("products");
    }
    
    public function testAddFiveProductsAndTruncate()
    {
         $this->products->addProducts("101", 1, "CPU",   1000);
         $this->products->addProducts("102", 2, "AVR",   2000);
         $this->products->addProducts("103", 3, "CHAIR", 3000);
         $this->products->addProducts("104", 4, "UPS",   4000);
         $this->products->addProducts("105", 5, "MOUSE", 5000);

        $result =  $this->getConnection()->getRowCount('products');
        $this->assertEquals(5, $result);
    }

    public function testRowCount()
    {
        $expected =  $this->getConnection()->getRowCount('products');
        $resultCount = $this->getConnection()->getRowCount('products');
        $this->assertSame($expected, $resultCount , "Pre-Condition");
    }

    public function testifSameFixturesAndTablesProductsStructure()
    {
        $resultTable = $this->getConnection()->createQueryTable(
            'products',
            'SELECT product_id, quantity, name, price FROM products'
        );
 
        $expectedTable = $this->getDataSet();
        $this->assertTablesEqual($expectedTable, $resultTable);

        //truncate products table
        $this->products->empty('products');
    }

    /**
     * close connection
     *
     * @return void
     * access public
     */
    public function tearDown()
    {
        parent::tearDown();
        
        //close connection for test case ProductsModelTest
        Connection::closeConnection(self::$pdo);
    }
}
