<?php
/**
 * CartTest
 * Cart
 */
class Cart {
	public function getItems() {
		return array();
	}

	public function add( $item_cd, $amount ) {
		if ( preg_match( '/^-?\d+$/', $amount ) ) {
			return true;
		} else {
			throw new UnexpectedValueException( 'Invalid amount' );
		}
	}

	public function getAmount( $item_cd ) {
		
	}
}
