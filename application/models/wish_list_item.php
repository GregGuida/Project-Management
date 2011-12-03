<?php

/*
 *	CREATE TABLE `CodeIgniter2`.`WishListItems` (
 *		`wishID` INT NOT NULL REFERENCES `CodeIgniter2`.`WishListItems` (`wishID`),
 *		`pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *	PRIMARY KEY ( `wishID` , `pid` )
 *	) ENGINE = INNODB;
*/

class Wish_List_Item extends CI_Model
{
	function __construct(){
		parent::__construct();
		// Custom constructor code goes here...
	}
	
	function find_by($data) {
	    $wish_lists = array();
	    $cursor = $this->db->get_where('WishListItems', $data);
        
        foreach($cursor->result_array() as $wish_list) {
            $wish_lists[] = $wish_list;
        }
	    
	    return $wish_lists;
	}
	
	function all($limit = 0) {
	    $wish_lists = array();
	    $cursor = $this->db->get('WishListItems', $limit);

        foreach($cursor->result_array() as $wish_list) {
            $wish_lists[] = $wish_list;
        }
	    
	    return $wish_lists;
	}
	
	function create($data) {	    
	    $wishId = false;
        $this->db->insert('WishListItems', $data);
        
        if(!$this->db->_error_message()) {
            $wishId = $this->db->insert_id();
        }

	    return $wishId;
	}
	
	function update($wishId, $data) {
	    $result = false;
	    $this->db->update('WishListItems', $data, array('wishID' => $wishId));

        if (!$this->db->_error_message()) {
          $result = $wishId;
        }
	    return $result;
	}
	
	function delete($wishId, $pid) {	    
	    $this->db->delete('WishListItems', array('wishID' => $wishId, 'pid' => $pid));
	    return !$this->db->_error_message();
    }
}