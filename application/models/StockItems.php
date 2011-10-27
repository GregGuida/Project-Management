<?php

/*
 * CREATE TABLE `CodeIgniter2`.`StockItems` (
 *	`stockID` INT NOT NULL AUTO_INCREMENT,
 *	`pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *	`ticketNum` INT NOT NULL REFERENCES `CodeIgniter2`.`StockTickets` (`ticketNum`),
 *	`PriceUSD` DECIMAL NOT NULL ,
 *	`Status` VARCHAR( 20 ) NOT NULL ,
 *	`DateAdded` TIMESTAMP NOT NULL ,
 *	PRIMARY KEY( `stockID`),
 * INDEX ( `pid` , `ticketNum` )
 * ) ENGINE = INNODB;
*/

class StockItems extends Models
{
	//Constructor
	function StockItems(){
		parent :: Models();
	}
	
	//Returns the given StockItems as an array
	function getStock($id)
	{
		$data = array();
		
		$query = $this->db->get_where('StockItems', array('stockID'=>$id));
		if($query->num_rows() > 0)
			$data = $query->row_array();
		
		$query->free_result(); //Release our memory
		return $data;		
	}
	
	//Returns the StockItems table as an array of arrays
	function getAllStockItems()
	{
		$data = array();
		$query = $this->db->get('StockItems');
		
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
				$data[] = $row;
		}
		else
			return false;
		
		$query->free_result();
		return $data;
	}
	
	//Adds a Stock Item. Foreign Keys: pid, ticketNum
	function newStockItems($pid, $ticket, $price, $status='OnOrder', $date)
	{
		$data = (
			'pid'		=>	$pid,
			'ticketNum'	=>	$ticket,
			'PriceUSD'	=>	$price,
			'Status'	=>	$status,
			'DateAdded'	=>	$date
		);
		
		$this->db->insert('StockItems', $data);
		return true;
	}
	
	//Deletes the given Stock Item
	function deleteStockItem($id)
	{
		$this->db->delete('StockItems', array('stockID'	=>	$id));
		return true;
	}
	
	function updateStockItem($stockId, $pid, $ticket, $price, $status='OnOrder', $date)
	{
		$data = (
			'pid'		=>	$pid,
			'ticketNum'	=>	$ticket,
			'PriceUSD'	=>	$price,
			'Status'	=>	$status,
			'DateAdded'	=>	$date
		);
		
		$this
	}
	
}

?>