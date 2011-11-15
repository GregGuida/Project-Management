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
	    $order = false;
	    $cursor = $this->db->get_where('Orders', array('OrderNum' => $order_num));
        
        if($cursor->num_rows() > 0) {
            $order = $cursor->row_array();
            $cursor->free_result();
        }
	    
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
	    $orders = array();
	    $cursor = $this->db->get_where('Orders', $data);
        
        foreach($cursor->result_array() as $order) {
            $orders[] = $order;
        }
	    
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
	    $orders = array();
	    $cursor = $this->db->get('Orders', $limit);

        foreach($cursor->result_array() as $order) {
            $orders[] = $order;
        }
	    
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
	    $order_num = false;
        $this->db->insert('Orders', $data);
        
        if(!$this->db->_error_message()) {
            $order_num = $this->db->insert_id();
        }

	    return $order_num;
	}
	
	/*
	 * Updates an order based on the passed in order id
	 *
	 * @param int   $order_num  id of the order to update
	 * @param array $data       the associative array of the data to be updated
	 *
	 * @return int $result id of the updated item, or false.
	 */
	function update($order_num, $data) {
	    $result = false;
	    $this->db->update('Orders', $data, array('OrderNum' => $order_num));

        if (!$this->db->_error_message()) {
          $result = $order_num;
        }
	    return $result;
	}
	
	/*
	 * Deletes an order based on the passed in order id, as well as all items in that order.
	 * THIS SHOULD NEVER EVER BE CALLED! Here for completions sake.
	 *
	 * @param array $data associative array of the order to create
	 *
	 * @return int $order_num the id of the created object
	 */
	function delete($order_num) {	    
	    $this->db->delete('Orders', array('OrderNum' => $order_num));
	    $this->db->delete('OrderedItems', array('OrderNum' => $order_num));
	    return !!$this->db->_error_message();
	}
	
	// ---------Convenience Functions---------
	
	/*
	 * Creates an order based on the items in a user's cart
	 *
	 * @param int $uid user whose cart should be converted to an order
	 *
	 * @return boolean $success if the conversion was successful or not
	 */
	function convert_cart_to_order($uid, $sid) {
	    // Load Model and Date Helper
	    $this->load->model("Ordered_Item", "item");
	    //TO-DO: Incorporate the CartItems Model
	    //$this->load->model("CartItem", "cart_item");
	    $this->load->helper("date");

	    $success = false;
	    $ordered_items = array();
	    
	    // Get the Total Price of all items in the given order
	    $totalPriceUSD = current($this->db->select("SUM(products.priceUSD)")->from("products")->join("stockitems", "products.pid = stockitems.pid")->join("cartitems", "cartitems.stockID = stockitems.stockID")->where("cartitems.uid", $uid)->where("didPurchase = 0")->get()->row_array());
	    
	    // Get all the user's unpurchased cart items
	    $stock_items_cursor = $this->db->get_where("CartItems", array("uid" => $uid, "didPurchase" => 0));
	    
	    // Insert the Order
	    $order_num = $this->create(array(
	                        "uid" => $uid, 
            	            "sid" => $sid, 
            	            "date" => date('Y-m-d H:i:s', now()),
            	            "status" => "Processing",
            	            "totalpriceusd" => $totalPriceUSD));
        
        // Create and insert the various Ordered Items
        foreach($stock_items_cursor->result_array() as $stock_item) {
            $ordered_items[] = array("OrderNum" => $order_num, "uid" => $uid, "stockID" => $stock_item["stockID"]);
        }
        
        // Set the 'didPurchase' flag in the CartItems table to 1 for the user.
        // $this->cart_item->update(array("uid" => $uid), array("didPurchase" => 1));
        
        $items_creation_success = $this->item->create($ordered_items);
        
        // Check for error messages
        if(!$this->db->_error_message() && $items_creation_success) {
            $success = true;
        }
	    
	    return $success;
	}
	
	/*
	 * Returns the pids of the products in a given order
	 *
	 * @param int $order_num the id of the concerned order
	 *
	 * @return array $product_ids array of the products (with pid, name, image[0], and price) associated with a given order
	 */
	function get_products_in_order($order_num) {
	    $product_ids = array();
	    
	    return $product_ids;
	}
}