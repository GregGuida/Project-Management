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
*/

class Orders extends Model
{
	
	//Constructor
	function Orders(){
		parent :: Models();
	}
	
	//Get an order of the given oid as an array
	function getOrder($id){
		$data = array();
		$query = $this->db->get_where('Orders', array('oid',$oid));
		
		if($query->num_rows() > 0)
			$data = $query->row_array();
		$query->free_result();
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
	function addOrder(){
	
	}

	//Update an Order
	function updateOrder($oid){
	
	}
	
	//Delete the given Order
	function deleteOrder($id){
		$this->db->delete('Orders', array('oid'=> $id));
	}
	
}

?>