<?php
/**
 * PHPUnit3で始めるユニットテスト
 * ショッピングカートクラスを作ってみる
 * http://gihyo.jp/dev/feature/01/php-test/0002
 */
class CartTest extends PHPUnit_Framework_TestCase {
	public function testInitCart() {
		$cart = new Cart();
		$this->assertTrue( is_array( $cart->getItems() ) );
		$this->assertEquals( 0, count( $cart->getItems() ) );
	}
}
