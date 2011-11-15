<?php

/*
 * ---Schema---
 * CREATE TABLE `CodeIgniter2`.`Orders` (
 *	`OrderNum` INT NOT NULL AUTO_INCREMENT,
 *	`uid` INT NOT NULL REFERENCES `CodeIgniter2`.`Users` (`uid`),
 *	`sid` INT NOT NULL REFERENCES `CodeIgniter2`.`ShippingAddresses` (`sid`),
 *	`Date` TIMESTAMP NOT NULL ,
 *	`Status` VARCHAR( 20 ) NOT NULL ,
 *	`TotalPriceUSD` DECIMAL NOT NULL ,
 *	PRIMARY KEY( `OrderNum`),
 *	INDEX ( `uid` , `sid` )
 * ) ENGINE = INNODB;
 */

class Order extends CI_Model {

	function __construct(){
		parent::__construct();
		// Custom constructor code goes here...
	}
	
	/*
	 * Finds a given order by its id.
	 *
	 * @param int $order_num the id of the concenred order
	 *
	 * @return array $order the associative array of the order, or false if it doesn't exist
	 */
	function find($order_num) {
	    var $order = false;
	    
	    // Some stuff...
	    
	    return $order;
	}
	
	/*
	 * Finds a given set of orders based on some property(ies)
	 *
	 * @param array $data associative array of the criteria to search for in the database
	 *
	 * @return array $orders the array of orders filling the criteria
	 */
	function find_by($data) {
	    var $orders = array();
	    
	    // Some stuff...
	    
	    return $orders;
	}
	
	/*
	 * Returns all orders, to a given limit.
	 *
	 * @param int $limit total number of rows you would like returned
	 *
	 * @return array $orders the array of orders
	 */
	function all($limit = 0) {
	    var $orders = array();
	    
	    // Some stuff...
	    
	    return $orders;
	}
	
	/*
	 * Creates an order based on the passed in data
	 *
	 * @param array $data associative array of the order to create
	 *
	 * @return int $order_num the id of the created object
	 */
	function create($data) {	    
	    // Some stuff...
	    
	    return $order_num;
	}
	
	/*
	 * Updates an order based on the passed in order id
	 *
	 * @param int $order_num id of the order to update
	 *
	 * @return boolean $success if the update was successful or not.
	 */
	function update($order_num) {
	    var $success = false;
	    	    
	    // Some stuff...
	    
	    return $success;
	}
	
	/*
	 * Deletes an order based on the passed in order id
	 *
	 * @param array $data associative array of the order to create
	 *
	 * @return int $order_num the id of the created object
	 */
	function delete($order_num) {	    
	    // Some stuff...
	    
	    return $order_num;
	}
	
	// ---------Convenience Functions---------
	
	/*
	 * Creates an order based on the items in a user's cart
	 *
	 * @param int $uid user whose cart should be converted to an order
	 *
	 * @return boolean $success if the conversion was successful or not
	 */
	function convert_cart_to_order() {
	    var $success = false;
	    
	    return $success;
	}
	
	/*
	 * Returns the pids of the products in a given order
	 *
	 * @param int $order_num the id of the concerned order
	 *
	 * @return array $product_ids array of the product ids associated with a given order
	 */
	function get_products_in_order($order_num) {
	    var $product_ids = array();
	    
	    return $product_ids;
	}
}