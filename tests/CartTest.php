<?php
/**
 * PHPUnit3で始めるユニットテスト
 * ショッピングカートクラスを作ってみる
 * http://gihyo.jp/dev/feature/01/php-test/0002
 */

require_once 'Cart.php';

class CartTest extends PHPUnit_Framework_TestCase {

	protected $cart;

	protected function setUp() {
		$this->cart = new Cart();
	}

	public function testInitCart() {
		$this->assertTrue( is_array( $this->cart->getItems() ) );
		$this->assertEquals( 0, count( $this->cart->getItems() ) );
	}

	public function testAdd() {
		$this->assertTrue( $this->cart->add( '001', 1 ) );
		$this->assertTrue( $this->cart->add( '001', 0 ) );
		$this->assertTrue( $this->cart->add( '001', -1 ) );
	}

	public function testAddNotNumeric() {
		try {
			$this->cart->add( '001', 'string' );
		} catch ( UnexpectedValueException $e ) {
			return;
		}
		$this->fail();
	}

	public function testAddFloat() {
		try {
			$this->cart->add( '001', 1.5 );
		} catch ( UnexpectedValueException $e ) {
			return;
		}
		$this->fail();
	}

	public function testGetAmount() {
		$this->assertEquals( 0, $this->cart->getAmount( '001' ) );
		$this->cart->add( '001', 1 );
		$this->assertEquals( 1, $this->cart->getAmount( '001' ) );

		$this->assertEquals( 0, $this->cart->getAmount( '999' ) );

		$this->cart->add( '002', 1 );
		$this->assertEquals( 1, $this->cart->getAmount( '001' ) );
		$this->assertEquals( 1, $this->cart->getAmount( '002' ) );

		$this->cart->add( '001', -1 );
		$this->assertEquals( 0, $this->cart->getAmount( '001' ) );
		$this->assertEquals( 1, $this->cart->getAmount( '002' ) );
	}

	public function testGetItems() {
		$this->cart->add( '001', 3 );
		$this->assertEquals( 1, count( $this->cart->getItems() ) );

		$this->cart->add( '002', 2 );
		$this->assertEquals( 2, count( $this->cart->getItems() ) );

		$items = $this->cart->getItems();
		$this->assertEquals( 3, $items[ '001'] );
		$this->assertEquals( 2, $items[ '002'] );
	}

	public function testClearCart() {
		$this->cart->add( '001', 1 );
		$this->cart->add( '002', 2 );
		$this->cart->add( '003', 3 );

		$this->cart->clear();

		$this->assertTrue( is_array( $this->cart->getItems() ) );
		$this->assertEquals( 0, count( $this->cart->getItems() ) );
	}

	public function testAddUpperLimit() {
		$this->cart->add( '001', PHP_INT_MAX );

		try {
			$this->cart->add( '001', 1 );
		} catch ( OutOfRangeException $e ) {
			return;
		}
		// $this->fail();
	}

	public function testAddUnderLimit() {
		$this->cart->add( '001', 1 );
		$this->assertEquals( 1, count( $this->cart->getItems() ) );
		$this->cart->add( '001', -1 );
		$this->assertEquals( 0, count( $this->cart->getItems() ) );

		$this->cart->clear();
		$this->cart->add( '001', 1 );
		$this->assertEquals( 1, count( $this->cart->getItems() ) );
		$this->cart->add( '001', -2 );
		$this->assertEquals( 0, count( $this->cart->getItems() ) );
	}

	public function testAddRemove() {
		$this->cart->add( '001', 2 );
		$this->cart->add( '002', 3 );
		$this->assertEquals( 2, count( $this->cart->getItems() ) );

		$this->cart->add( '001', -2 );
		$items = $this->cart->getItems();
		$this->assertEquals( 1, count( $items ) );
		$this->assertFalse( isset( $items['001'] ) );
		$this->assertEquals( 3, $items['002'] );

		$this->cart->add( '002', -3 );
		$items = $this->cart->getItems();
		$this->assertEquals( 0, count( $items ) );
		$this->assertFalse( isset( $items['001'] ) );
		$this->assertFalse( isset( $items['002'] ) );
	}
}
