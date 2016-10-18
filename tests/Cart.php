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
		if ( preg_match( '/^\d+$/', $amount ) && ( int )$amount > 0 ) {
			return true;
		} else {
			throw new OutOfBoundsException( 'Invalid amount' );
		}
	}
}
