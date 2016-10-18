<?php
/**
 * CartTest
 * Cart
 */
class Cart {
	private $items;

	public function __construct() {
		$this->items = array();
	}

	public function getItems() {
		return $this->items;
	}

	public function add( $item_cd, $amount ) {
		if ( preg_match( '/^-?\d+$/', $amount ) ) {
			if ( !isset( $this->items[$item_cd] ) ) {
				$this->items[$item_cd] = 0;
			}
			$this->items[$item_cd] += ( int )$amount;
			return true;
		} else {
			throw new UnexpectedValueException( 'Invalid amount' );
		}
	}

	public function getAmount( $item_cd ) {
		if ( isset( $this->items[$item_cd] ) ) {
			return $this->items[$item_cd];
		} else {
			return 0;
		}
	}

	public function clear() {
		
	}
}
