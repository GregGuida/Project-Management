<?php

class StockItems_Test
{
	$this->load->library('unit_test');
	$s1 = new StockItems;
	
	$test1 = $s1->newStockItem(1,1,42.24);
	$test2 = $s1->getStockItem(1);
	$test3 = $s1->getAllStockItems();
	$test4 = $s1->deleteStockItem(1);
	
	$this->unit->run($test1, true, 'Test adding new item');
	$this->unit->run($test2,'is_array', 'Test getting stock item');
	$this->unit->run($test3,'is_array', 'Test getting all stock items');
	$this->unit->run($test4, true, 'Test deleting a stock item');
}

?>