<?php

/*
 *	CREATE TABLE `CodeIgniter`.`Products` (
 *		`pid` INT NOT NULL AUTO_INCREMENT,
 *		`Name` VARCHAR( 100 ) NOT NULL ,
 *		`Description` VARCHAR( 100 ) NOT NULL ,
 *		`PriceUSD` DOUBLE NOT NULL ,
 *		`Image` VARCHAR( 100 ) ,
 *		PRIMARY KEY ( `pid` )
 *	) ENGINE = INNODB;
*/

class Products extends Model
{
	
	//Constructor
	function Products() {
		parent :: Model();
	}
	
	//Returns the Product with the given id# as an array of objects
	function getProduct($id)
	{
		$query = $this->db->get_where('Products', array('pid'=>$id));
		if($query->num_rows()==0)
			return false;
		$result = $query->result();
		
		$query->free_result(); //Release our memory
		return $result[0]; //There should Never be more than one row... But just in case.
	}
	
	//Returns the Product's ID number, given it's name
	function getProductId($name)
	{
		$query = $this->db->get_where('Products', array('Name'=>$name));
		if($query->num_rows()==0)
			return false;
		$result = $query->result();
		
		$query->free_result();
		return $result->pid;
	}
	
	//Returns an array of all the rows in the Products Table
	function getProductsTable()
	{
		$data = array();
		$query = $this->db->get('Products');
		
		
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
				$data[] = $row;
		}
		else
			return false;
		
		$query->free_result();
		return $data;
	}

	//Getters for our field values based on the Products ID
	function getProductName($id)
	{
		$product = getProduct($id);
		return $product->Name;
	}
	
	function getProductPrice($id)
	{
		$product = getProduct($id);
		return $product->PriceUSD;
	}
	
	
	//Returns an array of the IDs of Products cheaper than the given price
	function getProductsLessThan($price)
	{
		$table = getProductsTable();
		$data = array();
		if($table == null || $table == false) //Just incase we lost something along the way
			return false;
		
		foreach($table->result() as $row)
		{
			if($row->PriceUSD < $price)
				$data[] = $row->PriceUSD;
		}
		
		return $data;
	}
	
	function newProduct($name,$description,$price,$image=null)
	{
		$data = array(
				'Name' => $name,
				'Description' => $description,
				'PriceUSD' => $price,
				'Image' => $image
				);
		$this->db->insert('Products', $data);
		
		return true;
	}
	
	function deleteProduct($id)
	{
		$this->db->delete('Products', array('pid' => $id));
	}
	
	function updateProduct($id,$name,$description,$price,$image=null)
	{
		$data = array(
				'Name' => $name,
				'Description' => $description,				
				'PriceUSD' => $price,
				'Image' => $image
				);
		$this->db->update('Products', $data, array('pid' => $id));
		
		return true;
	}
	
}

?>