<?php

/**
 *
 * DROP TABLE IF EXISTS `CodeIgniter2`.`Comments`;
 * CREATE TABLE `CodeIgniter2`.`Comments` (
 *   `comID` INT NOT NULL AUTO_INCREMENT,
 *   `uid` INT NOT NULL REFERENCES `CodeIgniter2`.`Users` (`uid`),
 *   `pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *   `Remark` VARCHAR( 250 ) NOT NULL ,
 *   `Date` TIMESTAMP NOT NULL ,
 *   `Rating` DECIMAL NOT NULL,
 *   PRIMARY KEY ( `comID` ) ,
 *   INDEX ( `uid` , `pid` )
 * ) ENGINE = INNODB;
 *
 */

class Comments extends CI_Model {
	
  //Constructor
  function __construct() {
    parent::__construct();
  }
	
  //Returns the Comment with the given id# as an array
  function find($id) {
    $data = array();


    $this->db->select('Remark,Date,FirstName,LastName,Email');	
    $this->db->from('Comments');
    $this->db->where('Comments.comID',$id);
    $this->db->join('Users','Users.uid = Comments.uid');
    $query = $this->db->get();
    
    if( $query->num_rows() == 0 ) {
      return false;
    }
    
    $data = $query->row_array();
 
    $query->free_result(); //Release our memory
    return $data;
  }
	
  //Returns the Comment with the given pid# as an array
  function find_by_product($pid) {
    $comments = array();

    $this->db->select('comID,Remark,Date,FirstName,LastName,Email');	
    $this->db->from('Comments');
    $this->db->where('Comments.pid',$pid);
    $this->db->join('Users','Users.uid = Comments.uid');
    $query = $this->db->get();
    
    if( $query->num_rows() == 0 ) {
      return false;
    }
    
    foreach($query->result_array() as $comment) {
      $comments[] = $comment;
    }
 
    $query->free_result(); //Release our memory
    return $comments;
  }


  // accepts an optional limit
  // and returns an array of user row arrays
  function all($limit = 0, $orderBy = null, $direction = "desc") {
    $comments = array();

    if (orderBy != null){
    	$query = $this->db->order_by(orderBy, direction);
    }

    $query = $this->db->get('Comments', $limit);

    foreach($query->result_array() as $comment) {
      $comments[] = $comment;
    }

    $cursor->free_result();
    return $comments;
  }
	
  function create($name,$description,$price,$catID) {
    $data = array(
      'Name' => $name,
      'Description' => $description,
      'PriceUSD' => $price,
      'catID' => $catID
      );
    $this->db->insert('Comments', $data);

    return $this->db->insert_id();
  }
	
  function destroy($id) {
    $this->db->delete('Comments', array('pid' => $id));
    return true;
  }
	
  function update($id,$name,$description,$price,$catID){
    $data = array(
      'Name' => $name,
      'Description' => $description,				
      'PriceUSD' => $price,
      'catID' => $catID
    );
    $this->db->update('Comments', $data, array('pid' => $id));
    return true;
  }
	
}

?>
