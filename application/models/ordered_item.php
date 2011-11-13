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

class Ordered_Item extends CI_Model {
	
	//Constructor
	function __construct() {
		parent::__construct();
	}
	
	/*
	 * Finds all ordered items by their OrderNum.
	 * Reasoning: OrderItems will never be individual and will always be viewed as part of an associated Order
	 *
	 * @param int $order_num the id of the concenred order
	 *
	 * @return array $items the resulting array of ordered items
	 */
    function find($order_num) {
        $result = false;
        $cursor = $this->db->get_where('OrderedItems', array('OrderNum' => $order_num));
        
        if($cursor->num_rows() > 0) {
            $result = $cursor->row_array();
            $cursor->free_result();
        }
        
        return $result; 
    }

    /*
	 * Finds all ordered items by equivalence to some arbitrary parameter.
	 * Here for completeness, can't really see a need for this.
	 *
	 * @param array $data associative array of the data requested
	 *
	 * @return array $items the resulting array of ordered items
	 */
    function find_by($data) {
        $items = array();
        $cursor = $this->db->get_where('items', $data);
        
        foreach($cursor->result_array() as $item) {
            $items[] = $item;
        }
        
        return $items;
    }
    
    /*
	 * Finds all ordered items.
	 * Not sure where this will be needed; transaction analytics perhaps?
	 *
	 * @param int $limit The number of ordered items you would like returned.
	 *
	 * @return array $items the resulting array of ordered items
	 */
    function all($limit = 0) {
      $items = array();
      $cursor = $this->db->get('items', $limit);

      foreach($cursor->result_array() as $item) {
        $items[] = $item;
      }
      return $items;
    }	
}