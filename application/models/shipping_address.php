<?php

/*
 * CREATE TABLE `CodeIgniter2`.`ShippingAddresses` (
 *       `sid` INT NOT NULL AUTO_INCREMENT,
 *       `uid` INT NOT NULL REFERENCES `CodeIgniter2`.`Users` (`uid`),
 *       `Street` VARCHAR( 75 ) NOT NULL ,
 *       `City` VARCHAR( 75 ) NOT NULL ,
 *       `State` VARCHAR( 25 ) NOT NULL ,
 *       `Zip` CHAR( 5 ) NOT NULL ,
 *       PRIMARY KEY ( `sid` ) 
 * ) ENGINE = INNODB;
 */

class Shipping_Address extends CI_Model
{
	//Constructor
	function __construct() {
		parent :: __construct();
	}
	
	/*
	 * Finds a Shipping address by its sid.
	 *
	 * @param int $sid the id of the concerned address
	 *
	 * @return array $address the associative array of the returned addresss elements, or false. 
	 */
    function find($sid) {
        $address = false;
        $cursor = $this->db->get_where('ShippingAddresses', array('sid' => $sid));
        
        if($cursor->num_rows() > 0) {
            $result = $cursor->row_array();
            $cursor->free_result();
        }
        
        return $address; 
    }

    /*
	 * Finds all Shipping addresss by equivalence to some arbitrary parameter.
	 * Here for completeness, can't really see a need for this.
	 *
	 * @param array $data associative array of the data requested
	 *
	 * @return array $addresses the resulting array of Shipping addresss
	 */
    function find_by($data) {
        $addresses = array();
        $cursor = $this->db->get_where('ShippingAddresses', $data);
        
        foreach($cursor->result_array() as $address) {
            $addresses[] = $address;
        }
        
        return $addresses;
    }
    
    /*
	 * Finds all Shipping addresss.
	 *
	 * @param int $limit The number of Shipping addresss you would like returned.
	 *
	 * @return array $addresss the resulting array of Shipping addresss
	 */
    function all($limit = 0) {
      $addresss = array();
      $cursor = $this->db->get('ShippingAddresses', $limit);

      foreach($cursor->result_array() as $address) {
        $addresss[] = $address;
      }
      return $addresss;
    }
    
    /*
	 * Create a new Shipping address in the database
	 *
	 * @param array $data array of the items you want to create.
	 *
	 * @return boolean $result true if the insert succeeded, false otherwise.
	 */
    function create($data) {
        $result = false;
        
        $this->db->insert('ShippingAddresses', $data);
        
        if(!$this->db->_error_message()) {
            $result = true;
        }
        
        return $result;
    }
    
    /*
	 * Update a Shipping address in the database
	 *
	 * @param array $data array of the parameters you want updated for the address.
	 *
	 * @return boolean $address_id the id of the updated Shipping address if the insert succeeded, false otherwise.
	 */
	 function update($sid) {
	     $id = false;

         $this->db->update('ShippingAddresses', $data, array('sid' => $sid));

         if (!$this->db->_error_message()) {
           $id = $sid;
         }

         return $id;
	 }
    
    /*
	 * Removes a Shipping address from the database
	 *
	 * @param int $sid array of the items you want to create.
	 *
	 * @return boolean returns true is the delete executed without issue, otherwise false.
	 */
    function destroy($sid) {
        $this->db->delete('ShippingAddresses', array('sid' => $sid));
        return !!$this->db->_error_message();
    }
}