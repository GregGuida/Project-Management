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
		parent::__construct());
	}
	
	//Returns the Image with the given ID as an array
	//getImage() turned blue in my editor - not sure if already a PHP method??
	function getAnImage($imgID)
	{
		$data = array();
		$query = $this->db->get_where('Images', array('imgID' => $imgID));
		//Check if empty query
		if($query->num_rows() > 0)
			$data = $query->row_array();
		
		$query->free_result();
		return $data;
	}
	
	//Returns an array of arrays of all Images
	function getAllImages()
	{
		$data = array();
		$query = $this->db->get('Images');
		
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
				$data[] = $row;
		}
		
		$query->free_result();
		return $data;		
	}
	
	//addImage() was turning blue in my editor - not sure if already a PHP method??
	//naming this addAnImage() just in case :P
	function addAnImage($pid, $location)
	{
		$data = array(
			'pid'		=>	$pid,
			'location'	=>	$location
		);
		$this->db->insert('Images', $data);
	}
	
	function updateImage($imgID,$pid,$location)
	{
		$data = array(
			'pid'		=>	$pid,
			'location'	=>	$location
		);
		$this->db->update('Images', $data, array('imgID' => $imgID));
	}
	
	function deleteImage($imgID)
	{
		$this->db->delete('Images', array('imgID' => $imgID));
	}
	
}

?>