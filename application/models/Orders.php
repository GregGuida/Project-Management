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
	function getOrder($order){
		$order = array();
		$item  = array();
		
		$query = $this->db->get_where('Orders', array('OrderNum'=>$order));
		
		if($query->num_rows() == 0)
			return false;
		$order = $query->row_array();
		$query->free_result();
		
		$this->db->select('stockID','dataAdded');
		$array = array(
			'OrderNum'	=> $order,
			'cid'		=> $data['cid'],
			'stockID'	=> $data['stockID'],
			'dateAdded' => $data['dateAdded']
		);
		$query2 = $this->db->get_where('OrderedItems', $array);
		if($query2->num_rows() == 0)
			return false;
		$item = $query2->row_array();
		$query2->free_result();
		
		$data = array_merge($order,$items);		
		return $data;
	}
	
	//Returns all the orders as an array of arrays
	function getAllOrders(){
		$data = array();
		$query = $this->db->get('Orders');
		
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
	
	//Add an Order
	function addOrder($customer,$address,$status,$total){
		$data = array(
			'cid' 	 		=> $customer,
			'sid'	 		=> $address,
			'Status' 		=> $status,
			'TotalPriceUSD' => $total
		);
		
		$this->db->insert('Orders',$data);
	}

	//Update an Order
	function updateOrder($oid,$customer,$address,$status,$total){
		$data = array(
			'cid' 	 		=> $customer,
			'sid'	 		=> $address,
			'Status' 		=> $status,
			'TotalPriceUSD' => $total		
		);
		
		$this->db->update('Orders', $data, array('OrderNum'=>$oid));
	}
	
	//Delete the given Order
	function deleteOrder($id){
		$this->db->delete('Orders', array('OrderNum'=> $id));
	}
	
}

?>