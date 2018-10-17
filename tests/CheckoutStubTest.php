<?php 
declare(strict_types=1);

//use checkout class
use Classes\Checkouts;

use PHPUnit\Framework\TestCase;

interface MyThrowable extends Throwable
{
    public function trigger_exception(string $error);
}

class MyException extends Exception implements MyThrowable
{
    public function trigger_exception(string $error)
    {
        throw new Exception('Render error.'.$error);
    }
}

/**
 * CheckoutStubTest
 * @group group
 * 
 * @requires PHP 7.2
 */
class CheckoutStubTest extends TestCase
{
    /**
     * instance variable for stub class Checkouts
     *
     * @var string
     */
    public $chk = null;


    public function setUp()
    {
        //instantiate mock builder
        $this->chk = $this->createMock(Checkouts::class);
    }
    
    /**
     * Test for total discounted items
     *
     * @return void
     */
    public function testDiscountedPriceShouldReturnAnInteger()
    {
        $this->chk->method('validItemsDiscount')->willReturn(250);
        $this->assertEquals(250, $this->chk->validItemsDiscount(), "Discount should be: 250");
    }

    /**
     * Test for total original price
     *
     * @return void
     */
    public function testOriginalPriceShouldReturnAnInteger()
    {
        $this->chk->method('originalPrice')->willReturn(1000);
        $this->assertSame(1000, $this->chk->originalPrice(), "Original price should be: 1000");
    }
    
    /**
     * Test for Original price stripped comma
     *
     * @return void
     */
    public function testPriceShouldStripComma()
    {
        $this->chk->method('removePriceComma')->willReturn(5000);
        $this->assertEquals(5000, $this->chk->removePriceComma(1, 000), "Striped comma price should be: 5000");
    }

    /**
     * Test checkout items detail
     * Assume a failed test, should be an empty Item details first
     *
     * @return void
     */
    public function testItemsDetailsIfNotArrayOrNull()
    {
        $this->chk->method('checkoutItemsDetails')->will($this->returnValue([ "AVR" => 2000 ]));
        $this->assertTrue(!is_array($this->chk->checkoutItemsDetails()), "Items should be empty cart!.");
    }
    
    /**
     * @expectedException MyException
     */
    // public function testImplementationForErrorHandler()
    // {
    //     $ex = new MyException();
    //     $ex->trigger_exception("Skipped test");

    //     $this->markTestSkipped(
    //         'Mark incomplete'
    //       );
    // }

    public function tearDown()
    {
        parent::tearDown();
    }
}
