<?php

/* CREATE TABLE `CodeIgniter2`.`CartItems` (
 *	`cid` INT NOT NULL REFERENCES `CodeIgniter2`.`Customers` (`cid`),
 *	`stockID` INT NOT NULL REFERENCES `CodeIgniter2`.`StockItems` (`stockID`),
 *	`dateAdded` TIMESTAMP NOT NULL ,
 *	`didPurchase` BOOL NOT NULL ,
 *	PRIMARY KEY ( `cid` , `stockID` , `dateAdded` )
 * ) ENGINE = INNODB;
*/

class CartItems extends Models
{
	
	function CartItems(){
		parent :: Models();
	}
	
	//This will allow you to add a StockItem to a Customer's cart,
	//as long as we have that Product in stock.
	//NOTE: Add via PID, NOT StockID!
	function addItemToCart($pid,$cid)
	{
		//Find out if there are any StockItems available.
		$this->db->select('stockID');
		$this->db->get('StockItems');
		$this->db->where('Status !=', 'Sold');
		$query = $this->db->where('pid', $pid);
		//If so, store the first one we find
		if($query->num_rows() > 0)
			$item = $query->row_array();
		else
			return "No Items in Stock";
		
		$data = array(
			'cid' => $cid,
			'stockID' => $item['stockID']
		);
		
		$query->free_result();
		$this->db->insert('CartItems',$data);
		return true;		
	}
	
	//Gets items in a customer's cart that have not been purchased yet
	function getCart($id)
	{
		
	}
	
	
	
}

?>