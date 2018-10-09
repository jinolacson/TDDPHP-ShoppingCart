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

    public function setUp()
    {
       $this->cart = new Carts();
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
