<?php

class WishList_Test
{
	$this->load->library('unit_test');
	
	$w1 = new WishLists;
	$test = $w1->getWishList(1);
	$test2 = $w1->addItemToWishList(1,1);
	$test3 = $w1->removeItemFromWishList(1,1);
	$test4 = $w1->newWishList(1,'testing');
	$test5 = $w1->deleteWishList(1);
	
	$this->unit->run($test,'is_array','Get Wish List 1 Test');
	$this->unit->run($test2,true,'Add Item 1 to WishList 1');
	$this->unit->run($test,true,'Remove Item 1 from Wishlist 1');
	$this->unit->run($test,true,'Create new wishlist for Customer 1');
	$this->unit->run($test,true,'Delete WishList 1');
}

?>