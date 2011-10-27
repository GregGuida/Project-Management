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
		parent :: Models();
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
	
	}
	
	function getAllCategories()
	{
	
	}
	
}

?>