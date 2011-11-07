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

class WishLists extends CI_Model
{
	//Constructor
	public __construct(){
		parent :: __construct();
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
		$list = $query->row_array(); //Use row_array because there should never be more than 1 row
		$query->free_result();
		
		//Gets the products in our wish list from the WishListItems Table
		$this->db->select('pid');
		$query2 = $this->db->get_where('WishListItems', array('wishID' => $wishID));
		$items = $query2->result_array(); //Use result_array because we may have multiple products in a given list
		
		//Put all our info into one array and return it
		$result = array_merge($list,$items);
		$query2->free_result();
		return $result;
	}

	//Add a single item to a given wishlist
	function addItemToWishList($pid,$wishID)
	{
		$data = array(
			'wishID' => $wishID,
			'pid' 	 => $pid
		);
		
		$this->db->insert('WishListItems', $data);
		return true;
	}

	//Remove a single item from a given wishlist
	function removeItemFromWishList($pid,$wishID)
	{
		$data = array(
			'wishID' => $wishID,
			'pid' 	 => $pid
		);
		
		$this->db->delete('WishListItems', $data);
		return true;
	}

	//Create a new wishlist. Name not required.
	function newWishList($cid,$name='')
	{
		$data = array(
			'cid'  => $cid,
			'name' => $name
		);
		
		$this->db->insert('WishLists', $data);
		return true;
	}
	
	//Delete a given wishlist
	function deleteWishList($wishID)
	{
		$this->db->delete('WishListItems', array('wishID' => $wishID));
		$this->db->delete('WishLists', array('wishID' => $wishID));
		return true;
	}
	
}

?>