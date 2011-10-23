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
 
 * CREATE TABLE `CodeIgniter2`.`OrderedItems` (
 *	`OrderNum` INT NOT NULL REFERENCES `CodeIgniter2`.`Orders` (`OrderNum`),
 *	`cid` INT NOT NULL REFERENCES `CodeIgniter2`.`CartItems` (`cid`),
 *	`stockID` INT NOT NULL REFERENCES `CodeIgniter2`.`CartItems` (`stockID`),
 *	`dateAdded` TIMESTAMP NOT NULL REFERENCES `CodeIgniter2`.`CartItems` (`dateAdded`),
 *	PRIMARY KEY ( `OrderNum` , `cid` , `stockID` , `dateAdded` )
 * ) ENGINE = INNODB;
*/

class Orders extends Model
{
	
	//Constructor
	function Orders(){
		parent :: Models();
	}
	
	//Get an order of the given oid as an array
	function getOrder($oid){
		$order = array();
		$item  = array();
		
		$query = $this->db->get_where('Orders', array('OrderNum'=>$oid));
		
		if($query->num_rows() == 0)
			return false;
		$order = $query->row_array();
		$query->free_result();
//////////// NEED TO CHANGE - SOME FIELDS COME FROM CART ITEMS >_< /////////////////		
		$where = array(
			'OrderNum'	=> $oid,
			'cid'		=> $order['cid'],
			'stockID'	=> $order['stockID'],
			'dateAdded' => $order['dateAdded']
		);
		$this->db->select('stockID','dataAdded');
		$query2 = $this->db->get_where('OrderedItems', $where);
		if($query2->num_rows() == 0)
			return false;
		$item = $query2->row_array();
		$query2->free_result();
		
		$data = array_merge($order,$item);		
		return $data;
	}
	
	//Returns all the orders as an array of arrays
	function getAllOrders(){
		$data = array();
		$item = array();
		$query = $this->db->get('Orders');
//////////// NEED TO CHANGE - SOME FIELDS COME FROM CART ITEMS >_< /////////////////
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
			{
				
				$where = array(
					'OrderNum'	=> $row['OrderNum'],
					'cid'		=> $row['cid'],
					'stockID'	=> $row['stockID'],
					'dateAdded' => $row['dateAdded']
				);
				$this->select('stockID','dateAdded');
				$query2 = $this->get_where('OrderedItems',$where);
				if($query2->num_rows() > 0)
					$item = $query2->row_array();
				$merged = array_merge($row,$item);
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
	}

	function addOrderToItem($order,$customer,$stock,$date){
		$data = array(
			'OrderNum'	=> $order,
			'cid'		=> $customer,
			'stockID'	=> $stock,
			'dateAdded' => $date
		);
		
		$this->db->insert('OrderedItem', $data);
	}
	
	
	function removeOrderedItem($order,$customer,$stock,$dateAdded){
		$where = array(
			'OrderNum'	=> $order,
			'cid'		=> $customer,
			'stockID'	=> $stock,
			'dateAdded' => $dateAdded;
		);
		
		$this->db->delete->('OrderedItems', $where);
	}
	
	//Delete the given Order
	function deleteOrder($order){
		$this->db->delete('Orders', array('OrderNum'=> $order));
	}

	//Update an Order
	function updateOrder($order,$customer,$address,$status,$total){
		$data = array(
			'cid' 	 		=> $customer,
			'sid'	 		=> $address,
			'Status' 		=> $status,
			'TotalPriceUSD' => $total		
		);
		
		$this->db->update('Orders', $data, array('OrderNum'=>$order));
	}
	
}

?>