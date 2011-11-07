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
			'cid' 	  => $cid,
			'stockID' => $item['stockID']
			'didPurchase' => false;
		);
		
		$this->db->insert('CartItems',$data);
		$query->free_result();
		return true;		
	}
	
	//Gets items in a customer's cart that have not been purchased yet as an array
	function getCart($customer)
	{
		$this->db->get('CartItems');
		$this->db->where('cid',$customer);
		$query = $this->db->where('didPurchase',false);
		
		if($query->num_rows() == 0)
			return false;
		
		$result = $query->result_array();
		$query->free_result();
		return $result;
	}
	
	//Get every single cart.
	function getAllCarts()
	{
		$data = array();
		$query = $this->db->get('CartItems');
		
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[] = $row;	
			}
		}
		$query->free_result();
		return $data;
	}
	
	//Delete an item from a cart
	function deleteCartItem($cid,$stockID,$date)
	{
		$data = array(
			'cid' 		=> $cid,
			'stockID' 	=> $stockID,
			'dateAdded' => $date
		);
		
		$this->db->delete('CartItems',$data);
		return true;
	}
	
	//update CartItems <cid> to change didPurchase to true
	function purchased($cart,$stockID,$date)
	{
		$where = array(
			'cid' 		=> $cid,
			'stockID' 	=> $stockID,
			'dateAdded' => $date
		);
		$this->db->update('CartItems',array('didPurchase'=>true),$where);
		return true;
	}
	
}

?>