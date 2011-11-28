<?php

/*
 *	CREATE TABLE `CodeIgniter2`.`WishLists` (
 *		`wishID` INT NOT NULL AUTO_INCREMENT ,
 *		`uid` INT NOT NULL REFERENCES `CodeIgniter2`.`Users` (`uid`),
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

class WishList extends CI_Model
{
	//Constructor
	function __construct(){
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
		$query2 = $this->db->select('pid')
		                   ->get_where('WishListItems', array('wishID' => $wishID));
		$items = $query2->result_array(); //Use result_array because we may have multiple products in a given list
		
		//Put all our info into one array and return it
		$result = array_merge($list,$items);
		$query2->free_result();
		return $result;
	}
	
	//Returns all the wishlists a user has as an array
	function getListsOfUsers($uid)
	{
		$query = $this->db->select('wishID')->from('WishLists')->where('uid', $uid)->get();
		$result = array();
		$temp = array();
		$data = $query->result_array();
		foreach($data as $row)
		{
			$list = $this->getWishList($row['wishID']);
			//Do this so we can display how many items the list contains
			$list['count'] = $this->count($row['wishID']);
			$result[] = $list;
		}
		return $result;
	}
	
	//Returns the number of products in a wish list
	function count($wishID)
	{
		return count($this->getWishList($wishID));
	}

	//Add a single item to a given wishlist
	function addItemToList($pid,$wishID)
	{
		$result = false;
		$data = array(
			'wishID' => $wishID,
			'pid' 	 => $pid
		);
		
		$this->db->insert('WishListItems', $data);
		if(!$this->db->_error_message()) {
          $result = true;
        }		
		return $result;
	}

	//Remove a single item from a given wishlist
	function removeItemFromList($pid,$wishID)
	{
		$result = false;
		$data = array(
			'wishID' => $wishID,
			'pid' 	 => $pid
		);
		
		$this->db->delete('WishListItems', $data);
		if(!$this->db->_error_message()) {
          $result = true;
        }		
		return $result;
	}

	//Create a new wishlist. Name not required.
	function newWishList($uid,$name='')
	{
		$result = false;
		$data = array(
			'uid'  => $uid,
			'name' => $name
		);
		
		$this->db->insert('WishLists', $data);
		if(!$this->db->_error_message()) {
          $result = true;
        }		
		return $result;
	}
	
	//Delete a given wishlist
	function deleteWishList($wishID)
	{
		$result = false;
		$this->db->delete('WishListItems', array('wishID' => $wishID));
		$this->db->delete('WishLists', array('wishID' => $wishID));
		if(!$this->db->_error_message()) {
          $result = true;
        }		
		return $result;
	}
	
	function getDisplayArray($uid, $wishID)
	{
	 $result = array();
     $query = $this->db->select("Products.description, Products.name, Products.priceUSD, Products.pid, Images.location")->from("Products, Images")->join("WishListItems", "WishListItems.pid = Products.pid")->join("WishLists", "WishLists.wishID = WishListItems.wishID")->where("Products.pid = Images.pid")->where("WishLists.uid", $uid)->where("WishListItems.wishID", $wishID)->group_by("Products.pid")->get();
     $result = $query->result_array();
     $moreResult = array();
     foreach($result as $item)
     {
       $item['quantity'] = 0;
       $item['dup'] = 'false';
       array_push($moreResult,$item);
     }
     $result = $this->getQuantities($moreResult);
     return $result;	   
	}
	
  //Helper function - ugly, i know
  private function getQuantities($array)
  {
     $ids = array();
     $result = array();
     $temp = array();
     
     foreach($array as $row)
     {
        $pid = $row['pid'];
        $ids[] = $pid;
        $a = array_count_values($ids);
        $count = $a[$pid];
        $row['quantity'] = $count;
        if($count >= 2)
        foreach($array as $row2)
        {
           if($row2['pid'] == $pid)
           {
              $row['dup'] = 'true';
           }
        }
       array_push($temp,$row);
     }
     
     foreach($temp as $row)
     {
          $pid = $row['pid'];
          $a = array_count_values($ids);
          $count = $a[$pid];
          $row['quantity'] = $count;
          if($row['dup'] != 'true')
            array_push($result,$row);
     }

     return $result;
  }
	
}

?>
