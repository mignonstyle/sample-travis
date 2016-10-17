<?php
/**
 * PHPUnit入門の入門
 * https://simple-it-life.com/2016/02/25/phpunit/
 */

require_once 'Arithmetic.php';

class ArithmeticTest extends PHPUnit_Framework_TestCase {
	/**
	 * @var Arithmetic
	 */
	protected $object;

	/**
	 * setUpは各テストメソッドが実行される前に実行する
	 */
	protected function setUp() {
		// テストするオブジェクトを生成する
		$this->object = new Arithmetic();
	}

	/**
	 * 足し算関数の検証
	 */
	public function testAdd() {
		// 引数に3, 5を渡すと8が帰ってくることを確認する
		$this->assertEquals( 8, $this->object->add( 3, 5 ) );

		// 引数に15, 30を渡すと45が帰ってくることを確認する
		$this->assertEquals( 45, $this->object->add( 15, 30 ) );
	}

	/**
	 * 引き算関数の検証
	 */
	public function testSubtract() {
		// 引数に10, 3を渡すと7が帰ってくることを確認する
		$this->assertEquals( 7, $this->object->subtract( 10, 3 ) );

		// 引数に3, 9を渡すと-6が帰ってくることを確認する
		$this->assertEquals( -6, $this->object->subtract( 3, 9 ) );
	}

	/**
	 * 掛け算関数の検証
	 */
	public function testMultiply() {
		// 引数に4, 6を渡すと24が帰ってくることを確認する
		$this->assertEquals( 24, $this->object->multiply( 4, 6 ) );

		// 引数に4, -5を渡すと-20が帰ってくることを確認する
		$this->assertEquals( -20, $this->object->multiply( 4, -5 ) );
	}

	/**
	 * 割り算関数の検証
	 */
	public function testDivide() {
		// 引数に6, 2を渡すと3が帰ってくることを確認する
		$this->assertEquals( 3, $this->object->divide( 6, 2 ) );

		// 引数に6, 6を渡すと1が帰ってくることを確認する
		$this->assertEquals( 1, $this->object->divide( 6, 6 ) );
	}
}
