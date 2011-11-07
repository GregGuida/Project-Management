<?php

class StockTickets_Test
{
	$this->load->library('unit_test');
	$s1 = new StockTickets;
	
	$test1 = $s1->createTicket(1,1,13.37,42);
	$test2 = $s1->updateStatus(1,'Delivered');
	$test3 = $s1->getTicket(1);
	$test4 = $s1->getAllTickets();
	$test5 = $s1->deleteTicket();
	
	$this->unit->run($test1, true, 'Test adding ticket');
	$this->unit->run($test2, true, 'Test updating ticket\'s status');
	$this->unit->run($test3,'is_array', 'Test getting ticket');
	$this->unit->run($test4,'is_array', 'Test getting all tickets');
	$this->unit->run($test5, true, 'Test deleting tickets');
}

?>