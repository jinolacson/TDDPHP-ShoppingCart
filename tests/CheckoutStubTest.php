<?php 
declare(strict_types=1);

//use checkout class
use Classes\Checkouts;

use PHPUnit\Framework\TestCase;

/**
 * CheckoutStubTest
 * @group group
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
        $this->chk = $this->createMock(Checkouts::class);
    }
    
    public function testDiscountedPriceShouldReturnAnInteger()
    {
        $this->chk->method('validItemsDiscount')->willReturn(250);
        $this->assertEquals(250, $this->chk->validItemsDiscount(),"Discount should be: 250");
    }

    public function testOriginalPriceShouldReturnAnInteger()
    {
        $this->chk->method('originalPrice')->willReturn(1000);
        $this->assertSame(1000, $this->chk->originalPrice(),"Original price should be: 1000");
    }
    
    
    public function testPriceShouldStripComma()
    {
        $this->chk->method('removePriceComma')->willReturn(5000);
        $this->assertEquals(5000, $this->chk->removePriceComma(1,000),"Striped comma price should be: 5000");
    }


    public function testItemsDetailsIfNotArrayOrNull()
    {
        $this->chk->method('checkoutItemsDetails')->will($this->returnValue(null)); //[ "AVR" => 2000 ]
        $this->assertTrue(!is_array($this->chk->checkoutItemsDetails()),"Items should be in an empty array!.");
    }
    
    public function tearDown()
    {
        parent::tearDown();
    }
}
