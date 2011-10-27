<?php

class CartItems_Test
{
	$this->load->library('unit_test');
	
	$c1 = new CartItems;
	
	$test	= $c1->getCart(1);
	$test2	= $c1->getAllCarts();
	
	$this->unit->run($test, 'is_array', 'Get Cart Items Test');
	$this->unit->run($test2, 'is_array', 'Get All Carts Test');
}

?>