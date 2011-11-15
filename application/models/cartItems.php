<?php

/* CREATE TABLE `CodeIgniter2`.`CartItems` (
 *	`uid` INT NOT NULL REFERENCES `CodeIgniter2`.`Customers` (`cid`),
 *	`stockID` INT NOT NULL REFERENCES `CodeIgniter2`.`StockItems` (`stockID`),
 *	`dateAdded` TIMESTAMP NOT NULL ,
 *	`didPurchase` BOOL NOT NULL ,
 *	PRIMARY KEY ( `cid` , `stockID` , `dateAdded` )
 * ) ENGINE = INNODB;
*/

class CartItems extends CI_Model
{
	
	function __construct(){
		parent :: __construct();
	}
	
	//This will allow you to add a StockItem to a Customer's cart,
	//as long as we have that Product in stock.
	//NOTE: Add via PID, NOT StockID!
	function addItemToCart($pid,$uid)
	{
		$result = false;
		//Find out if there are any StockItems available.
		$query = $this->db->select('stockID')
				          ->from('StockItems')
				          ->where('Status !=', 'Sold')
						  ->where('pid', $pid)
						  ->get();
		//If so, store the first one we find
		if($query->num_rows() > 0)
			$item = $query->row_array();
		else
			return "No Items in Stock";
		
		$data = array(
			'uid' 	  => $uid,
			'stockID' => $item['stockID'],
			'didPurchase' => 0
		);
		
		$this->db->insert('CartItems',$data);
		if(!$this->db->_error_message()) {
          $result = true;
        }
		$query->free_result();
		return $result;		
	}
	
	//Gets items in a customer's cart that have not been purchased yet as an array
	function getCart($customer)
	{
		$query = $this->db->select()->from('CartItems')
		              ->where('uid',$customer)
		              ->where('didPurchase',0)
			          ->get();
		if($query->num_rows() == 0)
			return false;
		
		$result = $query->result_array();
		$query->free_result();
		return $result;
	}
	
	//Get every single cart.
	function getAllCarts($limit=0)
	{
		$data = array();
		$query = $this->db->get('CartItems',$limit);
		
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
	function deleteCartItem($uid,$stockID,$date)
	{
		$result = false;
		$data = array(
			'uid' 		=> $uid,
			'stockID' 	=> $stockID,
			'dateAdded' => $date
		);
		
		$this->db->delete('CartItems',$data);
		if(!$this->db->_error_message()) {
          $result = true;
        }		
		return $result;
	}
	
	//update CartItems <uid> to change didPurchase to true
	function purchased($cart,$stockID,$date)
	{
		$result = false;
		$where = array(
			'uid' 		=> $uid,
			'stockID' 	=> $stockID,
			'dateAdded' => $date
		);
		$this->db->update('CartItems',array('didPurchase'=>true),$where);
		if(!$this->db->_error_message()) {
          $result = true;
        }		
		return $result;
	}
	
}

?>
