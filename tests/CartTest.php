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
/*
	public function testAddPositive() {
		$cart = new Cart();
		$this->assertTrue( $cart->add( '001', 1 ) );
	}

	public function testAddZero() {
		$cart = new Cart();

		try {
			$cart->add( '001', 0 );
		} catch ( OutOfBoundsException $e ) {
			return;
		}
		$this->fail();
	}

	public function testAddNegative() {
		$cart = new Cart();

		try {
			$cart->add( '001', -1 );
		} catch ( OutOfBoundsException $e ) {
			return;
		}
		$this->fail();
	}
*/
	public function testAddNotNumeric() {
		$cart = new Cart();

		try {
			$cart->add( '001', 'string' );
		} catch( OutOfBoundsException $e ) {
			return;
		}
		$this->fail();
	}

	public function testAddFloat() {
		$cart = new Cart();

		try {
			$cart->add( '001', 1.5 );
		} catch( OutOfBoundsException $e ) {
			return;
		}
		$this->fail();
	}
}
