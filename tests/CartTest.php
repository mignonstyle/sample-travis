<?php
/**
 * PHPUnit3で始めるユニットテスト
 * ショッピングカートクラスを作ってみる
 * http://gihyo.jp/dev/feature/01/php-test/0002
 */

require_once 'Cart.php';

class CartTest extends PHPUnit_Framework_TestCase {

	public function testInitCart() {
		$cart = new Cart();
		$this->assertTrue( is_array( $cart->getItems() ) );
		$this->assertEquals( 0, count( $cart->getItems() ) );
	}

	public function testAdd() {
		$cart = new Cart();
		$this->assertTrue( $cart->add( '001', 1 ) );
		$this->assertTrue( $cart->add( '001', 0 ) );
		$this->assertTrue( $cart->add( '001', -1 ) );
	}

	public function testAddNotNumeric() {
		$cart = new Cart();

		try {
			$cart->add( '001', 'string' );
		} catch( UnexpectedValueException $e ) {
			return;
		}
		$this->fail();
	}

	public function testAddFloat() {
		$cart = new Cart();

		try {
			$cart->add( '001', 1.5 );
		} catch( UnexpectedValueException $e ) {
			return;
		}
		$this->fail();
	}

	public function testGetAmount() {
		$cart = new Cart();

		$this->assertEquals( 0, $cart->getAmount( '001' ) );
		$cart->add( '001', 1 );
		$this->assertEquals( 1, $cart->getAmount( '001' ) );

		$this->assertEquals( 0, $cart->getAmount( '999' ) );

		$cart->add( '002', 1 );
		$this->assertEquals( 1, $cart->getAmount( '001' ) );
		$this->assertEquals( 1, $cart->getAmount( '002' ) );

		$cart->add( '001', -1 );
		$this->assertEquals( 0, $cart->getAmount( '001' ) );
		$this->assertEquals( 1, $cart->getAmount( '002' ) );
	}

	public function testGetItems() {
		$cart = new Cart();

		$cart->add( '001', 3 );
		$this->assertEquals( 1, count( $cart->getItems() ) );

		$cart->add( '002', 2 );
		$this->assertEquals( 2, count( $cart->getItems() ) );

		$items = $cart->getItems();
		$this->assertEquals( 3, $items[ '001'] );
		$this->assertEquals( 2, $items[ '002'] );
	}

	public function testClearCart() {
		$cart = new Cart();

		$cart->add( '001', 1 );
		$cart->add( '002', 2 );
		$cart->add( '003', 3 );

		$cart->clear();

		$this->assertTrue( is_array( $cart->getItems() ) );
		$this->assertEquals( 0, count( $cart->getItems() ) );
	}

	public function testAddUpperLimit() {
		$cart = new Cart();

		$cart->add( '001', PHP_INT_MAX );

		try {
			$cart->add( '001', 1 );
		} catch( OutOfRangeException $e ) {
			return;
		}
		$this->fail();
	}

	public function testAddUnderLimit() {
		$cart = new Cart();

		$cart->add( '001', 1 );
		$this->assertEquals( 1, count( $cart->getItems() ) );
		$cart->add( '001', -1 );
		$this->assertEquals( 0, count( $cart->getItems() ) );

		$cart->clear();
		$cart->add( '001', 1 );
		$this->assertEquals( 1, count( $cart->getItems() ) );
		$cart->add( '001', -2 );
		$this->assertEquals( 0, count( $cart->getItems() ) );
	}

	public function testAddRemove() {
		$cart = new Cart();

		$cart->add( '001', 2 );
		$cart->add( '002', 3 );
		$this->assertEquals( 2, count( $cart->getItems() ) );

		$cart->add( '001', -2 );
		$items = $cart->getItems();
		$this->assertEquals( 1, count( $items ) );
		$this->assertFalse( isset( $items['001'] ) );
		$this->assertEquals( 3, $items['002'] );

		$cart->add( '002', -3 );
		$items = $cart->getItems();
		$this->assertEquals( 0, count( $items ) );
		$this->assertFalse( isset( $items['001'] ) );
		$this->assertFalse( isset( $items['002'] ) );
	}
}
