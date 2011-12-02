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
	
	function find($order_num) {
	    $order = false;
	    $cursor = $this->db->get_where('Orders', array('OrderNum' => $order_num));
        
        if($cursor->num_rows() > 0) {
            $order = $cursor->row_array();
            $cursor->free_result();
        }
	    
	    return $order;
	}
	
	function find_by($data) {
	    $orders = array();
	    $cursor = $this->db->get_where('Orders', $data);
        
        foreach($cursor->result_array() as $order) {
            $orders[] = $order;
        }
	    
	    return $orders;
	}
	
	function all($limit = 0) {
	    $orders = array();
	    $cursor = $this->db->get('Orders', $limit);

        foreach($cursor->result_array() as $order) {
            $orders[] = $order;
        }
	    
	    return $orders;
	}
	
	function create($data) {	    
	    $order_num = false;
        $this->db->insert('Orders', $data);
        
        if(!$this->db->_error_message()) {
            $order_num = $this->db->insert_id();
        }

	    return $order_num;
	}
	
	function update($order_num, $data) {
	    $result = false;
	    $this->db->update('Orders', $data, array('OrderNum' => $order_num));

        if (!$this->db->_error_message()) {
          $result = $order_num;
        }
	    return $result;
	}
	
	function delete($order_num) {	    
	    $this->db->delete('Orders', array('OrderNum' => $order_num));
	    $this->db->delete('OrderedItems', array('OrderNum' => $order_num));
	    return !!$this->db->_error_message();
	}
}