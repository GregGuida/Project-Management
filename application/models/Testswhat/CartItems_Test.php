<?php

class CartItems_Test
{
	$this->load->library('unit_test');
	$c1 = new CartItems;
	
	$test1 = $c1->addItemToCart(1,1);
	$test2 = $c1->getCart(1);
	$test3 = $c1->getAllCarts();
//	$test4 = $c1->purchased(
//  $test5 = $c1->deleteCartItem(

	$this->unit->run($test1, true, 'Test adding item');
	$this->unit->run($test2, 'is_array', 'Test getting item');
	$this->unit->run($test3, 'is_array', 'Test getting all items');
//	$this->unit->run($test4, 
//  $this->unit->run($test5

//	Commented because timestamp is needed as a parameter for these functions. Not sure how to get...
}

?>