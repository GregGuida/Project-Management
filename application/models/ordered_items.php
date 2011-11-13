<?php

/*
 * ---Schema---
 * CREATE TABLE `CodeIgniter2`.`OrderedItems` (
 *	`OrderNum` INT NOT NULL REFERENCES `CodeIgniter2`.`Orders` (`OrderNum`),
 *	`cid` INT NOT NULL REFERENCES `CodeIgniter2`.`CartItems` (`cid`),
 *	`stockID` INT NOT NULL REFERENCES `CodeIgniter2`.`CartItems` (`stockID`),
 *	PRIMARY KEY ( `OrderNum` , `cid` , `stockID` )
 * ) ENGINE = INNODB;
 */

class OrderedItems extends CI_Model {
	
	//Constructor
	function __construct() {
		parent::__construct();
	}
	
	/*
	 * Finds all ordered item by their OrderNum.
	 * Reasoning: OrderItems will never be individual and will always be viewed under an associated Order
	 *
	 * @param int $order_num the id of the concenred order
	 *
	 * @return array $items the resulting array of ordered items
	 */
    function find($order_num) {
        $result = false;
        $cursor = $this->db->get_where('Users', array('uid' => $uid));
        
        if($cursor->num_rows() > 0) {
            $result = $cursor->row_array();
            $cursor->free_result();
        }
        
        return $result; 
    }


    // accepts an associative array of parameters
    // Returns: an array of users
    function find_by($data) {
        $users = array();
        $cursor = $this->db->get_where('Users', $data);
        
        foreach($cursor->result_array() as $user) {
            $users[] = $user;
        }
        
        return $users;
    }
    
    function all($limit = 0) {
      $users = array();
      $cursor = $this->db->get('Users', $limit);

      foreach($cursor->result_array() as $user) {
        $users[] = $user;
      }
      return $users;
    }	
}