<?php

class Orders_Test
{
		$this->load->library('unit_test');
		$o1 = new Orders;
		
		$test1 = $o1->addOrder(1,'123 Test St','Processed',133.7);
		$test2 = $o1->addItemToOrder(1,1,1);
		$test3 = $o1->getOrder(1);
		$test4 = $o1->getAllOrders();
		$test5 = $o1->removeItemFromOrder(1,1,1);
		$test6 = $o1->deleteOrder(1);
		
		$this->unit->run($test1, true, 'Test adding order');
		$this->unit->run($test2, true, 'Test adding item to order');
		$this->unit->run($test3,'is_array', 'Test getting an order');
		$this->unit->run($test4,'is_array', 'Test getting all orders');
		$this->unit->run($test5, true, 'Test removing item from order');
		$this->unit->run($test6, true, 'Test deleting an order');
}

?>