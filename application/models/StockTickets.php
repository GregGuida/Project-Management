<?php

/*
 * CREATE TABLE `CodeIgniter2`.`StockTickets` (
 *	`ticketNum` INT NOT NULL AUTO_INCREMENT,
 *	`pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *	`eid` INT NOT NULL REFERENCES `CodeIgniter2`.`Employees` (`eid`),
 *	`PriceUSD` DECIMAL NOT NULL ,
 *	`NumOrdered` INT NOT NULL ,
 *	`DateSubmitted` TIMESTAMP NOT NULL ,
 *	`Status` VARCHAR( 20 ) NOT NULL ,
 *	PRIMARY KEY( `ticketNum`),
 * 	INDEX ( `pid` , `eid` )
 * ) ENGINE = INNODB;
*/

class StockTickets extends Models
{
	//Constructor
	function StockTickets() {
		parent :: Models();
	}
	
	//Returns the given StockTicket as an array
	function getTicket($ticketNum)
	{
		$data = array();
		$query = $this->db->get_where('StockTickets', array('ticketNum' => $ticketNum));
		//Check if it was an empty query
		if($query->num_rows() > 0)
			$data = $query->row_array();
		
		$query->free_result();
		return $data;
	}
	
	//Returns the StockTicket Table as an array of arrays
	function getAllTickets()
	{
		$data = array();
		$query = $this->db->get('StockTickets');
		
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
				$data[] = $row
		}
		else
			return false;
			
		$query->free_result();
		return $data;
	}
	
	//Create a Ticket and add it to the StockTickets table
	function createStockTicket($product, $employee, $price, $numOrdered, $date, $status='Submitted')
	{
		 $data = array(
		 	'pid'		=>	$product,
		 	'eid'		=>	$employee,
		 	'PriceUSD'	=>	$price,
		 	'NumOrdered'=>	$numOrdered,
		 	'DateSubmitted'	=>	$date,
		 	'Status'	=>	$status
		 );
		 
		 $this->db->insert('StockTickets', $data);
		 return true;
	}
	
	//Update the status of the given StockTicket
	function updateStatus($ticket, $status)
	{
		$this->db->update('StockTickets', array('Status' => $status), array('ticketNum' => $ticket));
		return true;
	}
	
	//Delete the StockTicket with the given ticketNum
	function deleteTicket($ticketNum)
	{
		$this->db->delete('StockTickets', array('ticketNum', $ticketNum));
		return true;
	}
	
}

?>