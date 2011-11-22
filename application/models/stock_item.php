<?php

/*
 * CREATE TABLE `CodeIgniter2`.`StockItems` (
 *	`stockID` INT NOT NULL AUTO_INCREMENT,
 *	`pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *	`stockID` INT NOT NULL REFERENCES `CodeIgniter2`.`StockItems` (`stockID`),
 *	`PriceUSD` DECIMAL NOT NULL ,
 *	`Status` VARCHAR( 20 ) NOT NULL ,
 *	`DateAdded` TIMESTAMP NOT NULL ,
 *	PRIMARY KEY( `stockID`),
 * INDEX ( `pid` , `stockID` )
 * ) ENGINE = INNODB;
*/

class Stock_Item extends CI_Model
{
	//Constructor
	function __construct(){
		parent :: __construct();
	}
	
	/*
	 * Finds a Stock item by its stockID.
	 *
	 * @param int $stock_id the id of the concerned item
	 *
	 * @return array $items the array of the returned items elements, or false. 
	 */
    function find($stock_id) {
        $result = false;
        $cursor = $this->db->get_where('StockItems', array('stockID' => $stock_id));
        
        if($cursor->num_rows() > 0) {
            $result = $cursor->row_array();
            $cursor->free_result();
        }
        
        return $result; 
    }

    /*
	 * Finds all stock items by equivalence to some arbitrary parameter.
	 *
	 * @param array $data associative array of the data requested
	 *
	 * @return array $items the resulting array of stock items
	 */
    function find_by($data) {
        $items = array();
        $cursor = $this->db->get_where('StockItems', $data);
        
        foreach($cursor->result_array() as $item) {
            $items[] = $item;
        }
        
        return $items;
    }
    
    /*
	 * Finds all Stock items.
	 *
	 * @param int $limit The number of stock items you would like returned.
	 *
	 * @return array $items the resulting array of stock items
	 */
    function all($limit = 0) {
      $items = array();
      $cursor = $this->db->get('StockItems', $limit);

      foreach($cursor->result_array() as $item) {
        $items[] = $item;
      }
      return $items;
    }
    
    /*
	 * Create a new Stock item in the database
	 *
	 * @param array $data array of the items you want to create.
	 *
	 * @return boolean $item_id the id of the inserted Stock item if the insert succeeded, false otherwise.
	 */
    function create($data) {
        $result = false;
        
        $this->db->insert('StockItems', $data);
        
        if(!$this->db->_error_message()) {
            $result = true;
        }
        
        return $result;
    }
    
    /*
	 * Update a Stock item in the database
	 *
	 * @param array $data array of the parameters you want updated for the item.
	 *
	 * @return boolean $item_id the id of the inserted Stock item if the insert succeeded, false otherwise.
	 */
	 function update($stock_id) {
	     $stock_id = false;

         $this->db->update('StockItems', $data, array('stockID' => $stock_id));

         if (!$this->db->_error_message()) {
           $stock_id = $id;
         }

         return $stock_id;
	 }
    
    /*
	 * Removes a Stock item from the database
	 *
	 * @param int $stock_id array of the items you want to create.
	 *
	 * @return boolean returns true is the delete executed without issue, otherwise false.
	 */
    function destroy($stock_id) {
        $this->db->delete('StockItems', array('stockID' => $stock_id));
        return !!$this->db->_error_message();
    }
     
}