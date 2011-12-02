<?php

/*
 * CREATE TABLE `CodeIgniter2`.`Categories`(
 *	 `catID` INT NOT NULL AUTO_INCREMENT,
 *	 `name` VARCHAR( 50 ) NOT NULL,
 *	 `parent` VARCHAR( 50 ),
 *	 PRIMARY KEY ( `catID` )
 *	) ENGINE = INNODB;
*/

class Category extends CI_Model {
	//Constructor
	function __construct() {
		parent :: __construct();
	}
	
	//Add a Category to a table. Category will be a 'Root' if no parent is given.
	function add($name,$parent = null) {
		$data = array(
			'name'	=>	$name,
			'parent'=>	$parent
		);
		
		$this->db->insert('Categories', $data);
	}
	
	//Mainly used to give a Category a parent. (Need to insert null as last param if no parent)
	function update($catID,$name,$parent = null) {
		$data = array(
			'name'	=>	$name,
			'parent'=>	$parent
		);
		
		$this->db->update('Categories', $data, array('catID' => $catID));
	}
	
	function destroy($catID) {
		$this->db->delete('Categories', array('catID' => $catID));
	}
	
	function get($catID) {
		$data = array();
		$query = $this->db->get_where('Categories', array('catID' => $catID));
		//Check if empty query
		if($query->num_rows() > 0){
			$data = $query->row_array();
		}
		
		$query->free_result();
		return $data;
	}
	
	function all($limit = 0) {
		$data = array();
		$this->db->select('*');
    	$this->db->from('Categories');
        $this->db->group_by('Categories.catID');
        $this->db->join('Products','Products.catID = Categories.catID','left');
        $this->db->join('Images','Images.pid = Products.pid','left');

		if ($limit) {
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		//Check if empty query
		if($query->num_rows() <= 0)
			return false;
		foreach($query->result_array() as $row)
			$data[] = $row;
		
		$query->free_result();
		return $data;
	}
	
	//Gets the parent of the given category
	function get_parent($catID) {
		$data = array();
				 $this->db->select('parent');
		$query = $this->db->get_where('Categories', array('catID' => $catID));
		
		if($query->num_rows() <= 0){
		  return false;
		}
			
		$data = $query->row_array();
		return $data['parent'];
	}

	function get_children($catID) {
		$data = array();
		$this->db->select('*');
		$query = $this->db->get_where('Categories', array('parent' => $catID));
		
		if($query->num_rows() <= 0) {
      return false;
    }

    foreach($query->result_array() as $row) {
      $data[] = $row;
    }

		$data = $query->row_array();
		return $data;
	}
 
  function get_top() {
    $data = array();
    $this->db->select('*');
    $this->db->from('Categories');
    $this->db->where('parent IS NULL');
    $query = $this->db->get();

    if($query->num_rows() <= 0) {
      return false;
    }

    foreach($query->result_array() as $row) {
      $data[] = $row;
    }

    return $data;
  }

	
}

?>
