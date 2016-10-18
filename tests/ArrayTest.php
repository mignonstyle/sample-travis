<?php
/**
 * 配列のサイズを確認するテスト
 * http://gihyo.jp/dev/feature/01/php-test/0001?page=2
 */

class ArrayTest extends PHPUnit_Framework_testCase {
	public function testNewArrayIsEmpty() {
		// 配列を作成
		$fixture = array();

		// 配列のサイズは0
		$this->assertEquals( 0, sizeof( $fixture ) );
	}

	/**
	 * メソッド名がtestで始まっていないが、「@test」アノテーションを使用していることに注意
	 *
	 * @test
	 */
	public function arrayContainsAnElementTest() {
		// 配列を作成
		$fixture = array();

		// 配列にひとつの要素を追加
		$fixture[] = 'Element';

		// 配列のサイズは1
		$this->assertEquals( 1, sizeof( $fixture ) );
	}
}
