<?php

/*
 *	CREATE TABLE `CodeIgniter`.`Products` (
 *		`pid` INT NOT NULL AUTO_INCREMENT,
 *		`Name` VARCHAR( 100 ) NOT NULL ,
 *		`Description` VARCHAR( 100 ) NOT NULL ,
 *		`PriceUSD` DOUBLE NOT NULL ,
 *		PRIMARY KEY ( `pid` )
 *	) ENGINE = INNODB;
*/

class Product extends CI_Model {
	
	//Constructor
	function __construct() {
		parent::__construct();
	}

	//Returns the Product with the given id# as an array
	function get($id) {
		$data = array();
		
    $this->db->select('*');
    $this->db->from('Products');
    $this->db->where('pid',$id);
		$query = $this->db->get();

		if($query->num_rows()==0) {
      return false;
    }
			
		$data = $query->result_array();
		
		$query->free_result(); //Release our memory
		return $data[0];
	}

	function find_by_category($catID) {
		$data = array();
		
		$this->db->select('*');	
    $this->db->group_by('Products.pid');
	  $this->db->from('Products');
	  $this->db->where('Products.catID',$catID);
	  $this->db->join('Images','Images.pid = Products.pid','left');
	  $query = $this->db->get();

		if($query->num_rows()==0) {
      return false;
    }
			
		$data = $query->result_array();
		
		$query->free_result(); //Release our memory
		return $data;
	}

	function find_by($data) {
   $products = array();

   $cursor = $this->db->get_where('Products', $data);

   foreach($cursor->result_array() as $product) {
     $products[] = $product;
   }

     return $products;
 }

  function find_like_search($search) {
    
   $products = array();

  $this->db->select('*');
  $this->db->from('Products');
  $this->db->like('Name', $search);
    		$this->db->group_by('Products.pid');
	  	$this->db->join('Images','Images.pid = Products.pid','left');
  $cursor = $this->db->get();

     foreach($cursor->result_array() as $product) {
       $products[] = $product;
     }

     return $products;
  }

	
	//Returns an array of all the rows in the Products Table
	function all($limit = 0) {
		$data = array();
    		$this->db->select('Products.pid, Products.Name, Products.Description, Products.PriceUSD, Categories.name, Images.location');
    		$this->db->group_by('Products.pid');
    		$this->db->from('Products');
    		$this->db->join('Categories','Products.catID = Categories.catID','left');
	  	$this->db->join('Images','Images.pid = Products.pid','left');
		if ($limit) {
			$this->db->limit($limit);
  		}
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			foreach($query->result_array() as $row) {
				$data[] = $row;
      			}
		}
		else {
			return false;
  		}
		$query->free_result();
		return $data;
	}


	function add($name,$description,$price,$catID) {
		$data = array(
				'Name' => $name,
				'Description' => $description,
				'PriceUSD' => $price,
				'catID' => $catID
				);
		$this->db->insert('Products', $data);

		return $this->db->insert_id();
	}
	
	function destroy($id) {
		$this->db->delete('Products', array('pid' => $id));
		return true;
	}
	
	function update($id,$name,$description,$price,$catID) {
		$data = array(
				'Name' => $name,
				'Description' => $description,				
				'PriceUSD' => $price,
				'catID' => $catID
				);
		$this->db->update('Products', $data, array('pid' => $id));

		return true;
	}	
}

?>
