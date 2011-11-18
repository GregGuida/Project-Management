<?php

/**
 * DROP TABLE IF EXISTS `CodeIgniter2`.`Products`;
 * CREATE TABLE `CodeIgniter2`.`Products` (
 *   `pid` INT NOT NULL AUTO_INCREMENT,
 *   `catID` INT REFERENCES `CodeIgniter2`.`Categories` (`catID`),
 *   `Name` VARCHAR( 100 ) NOT NULL ,
 *   `Description` VARCHAR( 10000 ) NOT NULL ,
 *   `PriceUSD` DOUBLE NOT NULL ,
 *   PRIMARY KEY ( `pid` )
 * ) ENGINE = INNODB;
 *
 */

class Products extends CI_Model{
	
  //Constructor
  function __construct() {
    parent::__construct();
  }
	
  //Returns the Product with the given id# as an array
  function find($id) {
    $data = array();

    $this->db->select('*');
    $this->db->from('Products');
    $this->db->where('pid',$id);
    $query = $this->db->get();
    
    if( $query->num_rows() == 0 ) {
      return false;
    }
    
    $data = $query->row_array();
 
    $query->free_result(); //Release our memory
    return $data;
  }


  // accepts an optional limit
  // and returns an array of user row arrays
  function all($limit = 0, orderBy = null, direction = "desc") {
    $products = array();

    if (orderBy != null){
    	$query = $this->db->order_by(orderBy, direction);
    }

    $query = $this->db->get('Products', $limit);

    foreach($query->result_array() as $product) {
      $products[] = $product
    }

    $cursor->free_result();
    return $products;
  }
	
  function create($name,$description,$price,$catID) {
    $data = array(
      'Name' => $name,
      'Description' => $description,
      'PriceUSD' => $price,
      'catID' => $catID
      );
    $this->db->insert('Products', $data);

    return $this->db->insert_id();
  }
	
  function destroy($id) {
    $this->db->delete('Products', array('pid' => $id));
    return true;
  }
	
  function update($id,$name,$description,$price,$catID){
    $data = array(
      'Name' => $name,
      'Description' => $description,				
      'PriceUSD' => $price,
      'catID' => $catID
    );
    $this->db->update('Products', $data, array('pid' => $id));
    return true;
  }	
}

?>
