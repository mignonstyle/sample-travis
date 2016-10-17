<?php
/**
 *
 */

require_once 'Arithmetic.php';

class ArithmeticTest extends PHPUnit_Framework_TestCase {
	/**
	 *
	 */
	protected $object;

	/**
	 *
	 */
	protected function setUp() {
		//
		$this->object = new Arithmetic();
	}


	/**
	 *
	 */
	public function testAdd() {
		//
		$this->assertEquals( 8, $this->object->add( 3, 5 ) );

		//
		$this->assertEquals( 45, $this->object->add( 15, 30 ) );
	}








}









 ?>
