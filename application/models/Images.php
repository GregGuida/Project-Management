<?php

/*
 * CREATE TABLE `CodeIgniter2`.`Images`(
 *	 `imgID` INT NOT NULL AUTO_INCREMENT,
 *	 `pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *	 `location` VARCHAR( 250 ) NOT NULL,
 *	 PRIMARY KEY ( `imgID` )
 * ) ENGINE = INNODB;
*/

class Images extends Models
{
	function Images() {
		parent :: Models();
	}
	
	//addImage() was turning blue in my editor - not sure if already a PHP method??
	//naming this addAnImage() just in case :P
	function addAnImage($pid, $location)
	{
		
	}
	
	function updateImage($imgID)
	{
	
	}
	
	function deleteImage($imgID)
	{
		$this->db->delete('Images', array('imgID' => $imgID));
	}
	
}

?>