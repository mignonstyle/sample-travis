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
		// 引数に3,5を渡すと8が帰ってくることを確認する
		$this->assertEquals( 10, $this->object->add( 3, 5 ) );

		// 引数に15, 30を渡すと45が帰ってくることを確認する
		$this->assertEquals( 45, $this->object->add( 15, 30 ) );
	}








}









 ?>
