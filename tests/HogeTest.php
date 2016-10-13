<?php
class HogeTest extends PHPUnit_Framework_TestCase {

  public function testHoge() {
    $this->assertEquals( 2, 1 + 1 );
  }

  public function testFuga() {
    $fuga = new Fuga();

    $this->assertTrue( $fuga=>index() );
  }
}
