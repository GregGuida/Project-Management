<?php

/*
 * CREATE TABLE `CodeIgniter2`.`Categories`(
 *	 `catID` INT NOT NULL AUTO_INCREMENT,
 *	 `name` VARCHAR( 50 ) NOT NULL,
 *	 `parent` VARCHAR( 50 ),
 *	 PRIMARY KEY ( `catID` )
 *	) ENGINE = INNODB;
*/

class Categories extends Models
{
	//Constructor
	function Categories() {
		parent::__construct());
	}
	
	//Add a Category to a table. Category will be a 'Root' if no parent is given.
	function addCategory($name,$parent = null)
	{
		$data = array(
			'name'	=>	$name,
			'parent'=>	$parent
		);
		
		$this->db->insert('Categories', $data);
	}
	
	//Mainly used to give a Category a parent. (Need to insert null as last param if no parent)
	function updateCategory($catID,$name,$parent)
	{
		$data = array(
			'name'	=>	$name,
			'parent'=>	$parent
		);
		
		$this->db->update('Categories', $data, array('catID' => $catID));
	}
	
	function deleteCategory($catID)
	{
		$this->db->delete('Categories', array('catID' => $catID));
	}
	
	function getCategory($catID)
	{
		$data = array();
		$query = $this->db->get_where('Categories', array('catID' => $catID));
		//Check if empty query
		if($query->num_rows() > 0)
			$data = $query->row_array();
		
		$query->free_result();
		return $data;
	}
	
	function getAllCategories()
	{
		$data = array();
		$query = $this->db->get_where('Categories', array('catID' => $catID));
		//Check if empty query
		if($query->num_rows() <= 0)
			return false;
		foreach($query->result_array() as $row)
			$data[] = $row;
		
		$query->free_result();
		return $data;
	}
	
	//Gets the parent of the given category
	function getParentCategory($catID)
	{
		$data = array();
				 $this->db->select('parent');
		$query = $this->db->get_where('Categories', array('catID' => $catID));
		
		if($query->num_rows() <= 0)
			return false;
		$data = $query->row_array();
		return $data['parent'];
	}
	
}

?>
