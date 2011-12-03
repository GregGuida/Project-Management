<?php

/*
 *	CREATE TABLE `CodeIgniter2`.`WishLists` (
 *		`wishID` INT NOT NULL AUTO_INCREMENT ,
 *		`uid` INT NOT NULL REFERENCES `CodeIgniter2`.`Users` (`uid`),
 *		`name` VARCHAR( 75 ) NOT NULL ,
 *	PRIMARY KEY ( `wishID`)
 *	) ENGINE = INNODB;
 */

class Wish_List extends CI_Model
{
	function __construct(){
		parent::__construct();
		// Custom constructor code goes here...
	}
	
	function find($wishId) {
	    $wish_list = false;
	    $cursor = $this->db->get_where('WishLists', array('wishID' => $wishId));
        
        if($cursor->num_rows() > 0) {
            $wish_list = $cursor->row_array();
            $cursor->free_result();
        }
	    
	    return $wish_list;
	}
	
	function find_by($data) {
	    $wish_lists = array();
	    $cursor = $this->db->get_where('WishLists', $data);
        
        foreach($cursor->result_array() as $wish_list) {
            $wish_lists[] = $wish_list;
        }
	    
	    return $wish_lists;
	}
	
	function all($limit = 0) {
	    $wish_lists = array();
	    $cursor = $this->db->get('WishLists', $limit);

        foreach($cursor->result_array() as $wish_list) {
            $wish_lists[] = $wish_list;
        }
	    
	    return $wish_lists;
	}
	
	function create($data) {	    
	    $wishId = false;
        $this->db->insert('WishLists', $data);
        
        if(!$this->db->_error_message()) {
            $wishId = $this->db->insert_id();
        }

	    return $wishId;
	}
	
	function update($wishId, $data) {
	    $result = false;
	    $this->db->update('WishLists', $data, array('wishID' => $wishId));

        if (!$this->db->_error_message()) {
          $result = $wishId;
        }
	    return $result;
	}
	
	function delete($wishId) {	    
	    $this->db->delete('WishLists', array('wishID' => $wishId));
	    $this->db->delete('WishListItems', array('wishID' => $wishId));
	    return !$this->db->_error_message();
	}
	
	function get_products_in_wishlist($wishId) {
	    $products = array();
	    
	    $products_cursor = $this->db->query("select p.pid, p.name, p.priceUSD, i.location, quantity from Products as p, Images as i, (select p.pid, count(p.pid) as quantity from Products as p join WishLists as w, WishListItems as wi where w.wishID = wi.wishID and wi.pid = p.pid and w.wishID = ".$wishId." group by pid) as quantity join WishLists as w, WishListItems as wi where w.wishID = ".$wishId." and w.wishID = wi.wishID and wi.pid = p.pid and i.pid = p.pid group by pid");
	    
	    foreach($products_cursor->result_array() as $product) {
	        $products[] = $product;
	    }
	    
	    return $products;
	}
}