<?php

/*
 * CREATE TABLE `CodeIgniter2`.`Orders` (
 *	`OrderNum` INT NOT NULL AUTO_INCREMENT,
 *	`cid` INT NOT NULL REFERENCES `CodeIgniter2`.`Customers` (`cid`),
 *	`sid` INT NOT NULL REFERENCES `CodeIgniter2`.`ShippingAddresses` (`sid`),
 *	`Date` TIMESTAMP NOT NULL ,
 *	`Status` VARCHAR( 20 ) NOT NULL ,
 *	`PriceUSD` DECIMAL NOT NULL ,
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
	
	}
	
	//Returns all the orders as an array of arrays
	function getAllOrders(){
	
	}
	
	//Add an Order
	function addOrder(){
	
	}

	//Update an Order
	function updateOrder($oid){
	
	}
	
	//Delete the given Order
	function deleteOrder($id){
	
	}
	
}

?>