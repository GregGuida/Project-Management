<?php

/*
 *	CREATE TABLE `CodeIgniter2`.`WishLists` (
 *		`wishID` INT NOT NULL AUTO_INCREMENT ,
 *		`cid` INT NOT NULL REFERENCES `CodeIgniter2`.`Customers` (`cid`),
 *		`name` VARCHAR( 75 ) NOT NULL ,
 *	PRIMARY KEY ( `wishID`)
 *	) ENGINE = INNODB;
 *
 *	CREATE TABLE `CodeIgniter2`.`WishListItems` (
 *		`wishID` INT NOT NULL REFERENCES `CodeIgniter2`.`WishLists` (`wishID`),
 *		`pid` INT NOT NULL REFERENCES `CodeIgniter2`.`Products` (`pid`),
 *	PRIMARY KEY ( `wishID` , `pid` )
 *	) ENGINE = INNODB;
*/

class WishLists extends Models
{
	//Constructor
	public WishLists(){
		parent :: Models();
	}
	
	//Returns the Wish List and its items as a single array for the given wishID
	function getWishList($wishID)
	{
		$list = array();
		$items = array();

		//Get's the info from the WishLists Table
		$query = $this->db->get_where('WishLists', array('wishID' => $wishID));
		if($query->num_rows()==0)
			return false;
		$list = $query->row_array();
		
		//Gets the info from the WishListItems Table
		$this->db->select('pid');
		$query2 = $this->db->get_where('WishListItems', array('wishID' => $wishID);
		$items = $query2->row_array();
		
		//Put all our info into one array and return it
		$result = array_merge($list,$items);
		$query->free_result();
		$query2->free_result();
		return $result;
	}

	//Helper function... Not sure yet if it will be needed
	private function getWishID($cid)
	{
		$this->db->select('wishID');
		$this->db->get('WishLists');
		$wishID = $this->db->where('cid',$cid);
		
		return $wishID;
	}
	
}

?>