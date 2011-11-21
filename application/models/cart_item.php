<?php

/* CREATE TABLE `CodeIgniter2`.`CartItems` (
 *	`uid` INT NOT NULL REFERENCES `CodeIgniter2`.`Users` (`uid`),
 *	`stockID` INT NOT NULL REFERENCES `CodeIgniter2`.`StockItems` (`stockID`),
 *	`dateAdded` TIMESTAMP NOT NULL ,
 *	`didPurchase` BOOL NOT NULL ,
 *	PRIMARY KEY ( `uid` , `stockID` , `dateAdded` )
 * ) ENGINE = INNODB;
*/

class Cart_Item extends CI_Model
{
	
	function __construct(){
		parent :: __construct();
	}
	
	//This will allow you to add a StockItem to a Customer's cart,
	//as long as we have that Product in stock.
	//NOTE: Add via PID, NOT StockID
	function addItem($pid,$uid)
	{
		$result = false;
		//Find out if there are any StockItems available.
		$query = $this->db->select('stockID')
				          ->from('StockItems')
				          ->where('Status !=', 'Sold')
						  ->where('pid', $pid)
						  ->get();
		//If so, store the first one we find
		if($query->num_rows() > 0)
			$item = $query->row_array();
		else
			return "No Items in Stock";
		
		$data = array(
			'uid' 	  => $uid,
			'stockID' => $item['stockID'],
			'didPurchase' => 0
		);
		
		$this->db->insert('CartItems',$data);
		if(!$this->db->_error_message()) {
          $result = true;
        }
		$query->free_result();
		return $result;		
	}
	
	//Gets items in a customer's cart that have not been purchased yet as an array
	function get($customer)
	{
		$query = $this->db->select()->from('CartItems')
		              ->where('uid',$customer)
		              ->where('didPurchase',0)
			          ->get();
		if($query->num_rows() == 0)
			return false;
		
		$result = $query->result_array();
		$query->free_result();
		return $result;
	}
	
	//Get every single cart.
	function getAll($limit=0)
	{
		$data = array();
		$query = $this->db->get('CartItems',$limit);
		
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[] = $row;	
			}
		}
		$query->free_result();
		return $data;
	}
	
	//Delete an item from a cart
	function deleteItem($uid,$stockID,$date)
	{
		$result = false;
		$data = array(
			'uid' 		=> $uid,
			'stockID' 	=> $stockID,
			'dateAdded' => $date
		);
		
		$this->db->delete('CartItems',$data);
		if(!$this->db->_error_message()) {
          $result = true;
        }		
		return $result;
	}
	
	//update CartItems <uid> to change didPurchase to true
	function purchased($cart,$stockID,$date)
	{
		$result = false;
		$where = array(
			'uid' 		=> $uid,
			'stockID' 	=> $stockID,
			'dateAdded' => $date
		);
		$this->db->update('CartItems',array('didPurchase'=>true),$where);
		if(!$this->db->_error_message()) {
          $result = true;
        }		
		return $result;
	}
	
// ---------- Convienence functions -----------

  //Runs query in order to get all info to be displayed on the Cart View
  function getDisplayArray($uid)
  {
    /* 
     * SELECT p.name, p.description, p.PriceUSD, p.pid, i.location
     * FROM Products as p, Images as i, Users as u
     * JOIN  StockItems as s ON ON s.pid = p.pid
       JOIN  CartItems as c ON c.stockID = s.stockID 
       WHERE i.pid = p.pid
     * AND   u.uid = $uid
     */
     
     // select p.name, p.description, p.PriceUSD, p.pid, i.location from Products as p, Images as i join StockItems as s, CartItems as c where s.pid = p.pid and c.stockID = s.stockID and i.pid = p.pid and c.uid = 1 and c.didPurchase = 0 group by p.pid
     
     $result = array();
     $clause = array(
			   'CartItems.stockID = StockItems.stockID',
			   'StockItems.pid = Products.pid',
			   'Users.uid'		   => $uid
     );
     
     $query = $this->db->select("Products.description, Products.name, Products.priceUSD, Products.pid, Images.location")->from("Products, Images")->join("StockItems", "StockItems.pid = Products.pid")->join("CartItems", "CartItems.stockId = StockItems.stockId")->where("Products.pid = Images.pid")->where("CartItems.uid", $uid)->where("CartItems.didPurchase", 0)->group_by("Products.pid")->get();
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
  
  function numItems($uid)
  {
      $cart = $this->get($uid);
      return count($cart);
  }
  
  //Returns the total Price of the given customer's cart
  function totalPrice($uid)
  {
    $totalPriceUSD = current($this->db->select("SUM(products.priceUSD)")->from("products")->join("stockitems", "products.pid = stockitems.pid")->join("cartitems", "cartitems.stockID = stockitems.stockID")->where("cartitems.uid", $uid)->where("didPurchase = 0")->get()->row_array());
    return $totalPriceUSD;
  }
  
}

?>
