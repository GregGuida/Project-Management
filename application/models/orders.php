<?php

/*
 * CREATE TABLE `CodeIgniter2`.`Orders` (
 *	`OrderNum` INT NOT NULL AUTO_INCREMENT,
 *	`cid` INT NOT NULL REFERENCES `CodeIgniter2`.`Customers` (`cid`),
 *	`sid` INT NOT NULL REFERENCES `CodeIgniter2`.`ShippingAddresses` (`sid`),
 *	`Date` TIMESTAMP NOT NULL ,
 *	`Status` VARCHAR( 20 ) NOT NULL ,
 *	`TotalPriceUSD` DECIMAL NOT NULL ,
 *	PRIMARY KEY( `OrderNum`),
 *	INDEX ( `cid` , `sid` )
 * ) ENGINE = INNODB;
 *
 * CREATE TABLE `CodeIgniter2`.`OrderedItems` (
 *	`OrderNum` INT NOT NULL REFERENCES `CodeIgniter2`.`Orders` (`OrderNum`),
 *	`cid` INT NOT NULL REFERENCES `CodeIgniter2`.`CartItems` (`cid`),
 *	`stockID` INT NOT NULL REFERENCES `CodeIgniter2`.`CartItems` (`stockID`),
 *	PRIMARY KEY ( `OrderNum` , `cid` , `stockID` , `dateAdded` )
 * ) ENGINE = INNODB;
*/

class Orders extends Model
{
	
	//Constructor
	function Orders(){
		parent::__construct());
	}
	
	//Get an order of the given oid as an array
	function getOrder($oid){
		$order = array();
		$items  = array();
		
		$query = $this->db->get_where('Orders', array('OrderNum'=>$oid));
		
		if($query->num_rows() == 0)
			return false;
		$order = $query->row_array();
		$query->free_result();
		
		$where = array(
			'OrderNum'	=> $oid,
			'cid'		=> $order['cid'],
		);
		$this->db->select('stockID');
		$query2 = $this->db->get_where('OrderedItems', $where);
		if($query2->num_rows() == 0)
			return false;
		$items = $query2->result_array();
		$query2->free_result();
//May not want to merge, and just have the last index of $data be an array of items...Something to think about		
		$data = array_merge($order,$items);		
		return $data;
	}
	
	//Returns all the orders as an array of arrays
	function getAllOrders(){
		$data = array();
		$items = array();
		
		$query = $this->db->get('Orders');
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
			{
				$where = array(
					'OrderNum'	=> $row['OrderNum'],
					'cid'		=> $row['cid'],
				);
				//We are going to add the stockID for the products in this order
				$this->select('stockID');
				$query2 = $this->get_where('OrderedItems', $where);
				if($query2->num_rows() > 0)
					$items = $query2->result_array();
				$merged = array_merge($row,$items);
				$data[] = $merged;
			}
		}
		else
			return false;		
		$query->free_result();
		return $data;
	}
	
	//Add an Order
	function addOrder($customer,$address,$status='Processed',$total){
		$data = array(
			'cid' 	 		=> $customer,
			'sid'	 		=> $address,
			'Status' 		=> $status,
			'TotalPriceUSD' => $total
		);
		
		$this->db->insert('Orders',$data);
		return true;
	}

	//Add an item to an order by inserting into the OrderedItems table
	function addItemToOrder($order,$customer,$stock){
		$data = array(
			'OrderNum'	=> $order,
			'cid'		=> $customer,
			'stockID'	=> $stock
		);
		
		$this->db->insert('OrderedItems', $data);
		return true;
	}
	
	//Remove an item from an order by deleting it from the OrderedItems table
	function removeItemFromOrder($order,$customer,$stock){
		$where = array(
			'OrderNum'	=> $order,
			'cid'		=> $customer,
			'stockID'	=> $stock
		);
		
		$this->db->delete->('OrderedItems', $where);
		return true;
	}
	
	//Delete the given Order, and it's associated items
	function deleteOrder($order){
		$this->db->delete('OrderedItems', array('OrderNum'=> $order));
		$this->db->delete('Orders', array('OrderNum'=> $order));
		return true;
	}

	//Update an Order
	function updateOrder($order,$customer,$address,$status,$total){
		$data = array(
			'cid' 	 		=> $customer,
			'sid'	 		=> $address,
			'Status' 		=> $status,
			'TotalPriceUSD'	=> $total		
		);
		
		$this->db->update('Orders', $data, array('OrderNum'=>$order));
		return true;
	}
	
}

?>