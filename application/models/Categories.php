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
		
	function addCategory($name,$parent = null)
	{
	
	}
	
	//Mainly used to give a Category a parent. (Need to insert null as last param if no parent)
	function updateCategory($catID,$name,$parent)
	{
	
	}
	
	function getCategory($catID)
	{
	
	}
	
	function getAllCategories()
	{
	
	}
	
}

?>