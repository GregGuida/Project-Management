<?php

/*
 * CREATE TABLE `CodeIgniter2`.`Images`(
 *	 `imgID` INT NOT NULL AUTO_INCREMENT,
 *	 `pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *	 `location` VARCHAR( 250 ) NOT NULL,
 *	 PRIMARY KEY ( `imgID` )
 * ) ENGINE = INNODB;
*/

class Image extends CI_Model {
  function __construct() {
    parent :: __construct();
  }

  //Returns the Image with the given ID as an array
  //getImage() turned blue in my editor - not sure if already a PHP method??
  function find($pid) {
    $data = array();
    $this->db->select('location');
    $query = $this->db->get_where('Images', array('pid' => $pid));

    if($query->num_rows() > 0) {
      foreach($query->result_array() as $row) {
        $data[] = $row;
      }
    }		

    $query->free_result();
    return $data;
  }
	
  //Returns an array of arrays of all Images
  function all() {
    $data = array();
    $query = $this->db->get('Images');
		
    if($query->num_rows() > 0) {
      foreach($query->result_array() as $row) {
        $data[] = $row;
      }
    }
    $query->free_result();
    return $data;		
  }
	
  function add($pid, $location) {
    $data = array(
      'pid'		=>	$pid,
      'location'	=>	$location
      );
    $this->db->insert('Images', $data);
  }
	
  function update($imgID,$pid,$location) {
    $data = array(
       'pid'		=>	$pid,
       'location'	=>	$location
      );
    $this->db->update('Images', $data, array('imgID' => $imgID));
  }
	
  function destroy($imgID) {
    $this->db->delete('Images', array('imgID' => $imgID));
  }
	
}

?>
