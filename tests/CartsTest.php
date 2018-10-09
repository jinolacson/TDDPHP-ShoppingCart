<?php
declare(strict_types=1);

include_once './classes/Carts.php';

use PHPUnit\Framework\TestCase;

/**
 * CartsTest
 * @group Carts Test Case
 */
class CartsTest extends TestCase
{
    protected $cart;
    protected static $item_code_example = 101;

    public function setUp()
    {
        $this->cart = new Carts();
        $this->cart->setItemCode(self::$item_code_example);
    }
    
    /**
     * Check first if item code has value
     *
     * @return void
     * access public
     */
    public function testItemCodeNotEmpty()
    {
        $this->assertTrue(!empty($this->cart->getItemCode()));
    }

    /**
     * Check item code if type is integer
     *
     * @return void
     * access public
     */
    public function testSetItemCode()
    {
        $this->assertInternalType('integer', $this->cart->getItemCode());
    }
    
    /**
     * @dataProvider cartVariablesProvider
     */
    public function testCartVariables($compare,$type)
    {
        $expected = $this->cart::checkVariables($compare,$type);
        $this->assertTrue(!empty($expected));
    }

    /**
     * @return void
     */
    public function cartVariablesProvider()
    {
        return [
            [self::$item_code_example,'id'],
            [self::$item_code_example,'quantity'],
            [self::$item_code_example,'name'],
            [self::$item_code_example,'price']
         ];
    }

    /**
     * Cart Items should be in array form
     *
     * @return void
     * access public
     */
    public function testCartItemsType()
    {
        $this->assertInternalType('array', $this->cart->getCartItems());
    }

    /**
     * Stop executing parent file
     *
     * @return void
     * access protected
     */
    public function tearDown()
    {
        parent::tearDown();
    }
}
