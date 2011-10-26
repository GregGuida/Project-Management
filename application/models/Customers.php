<?php

/*  CREATE TABLE  `CodeIgniter`.`Customers` (
 *			`uid` INT NOT NULL REFERENCES  `CodeIgniter`.`Users` (`uid`),
 *			`cid` INT NOT NULL AUTO_INCREMENT ,
 *			`DOB` DATE NOT NULL ,
 *		PRIMARY KEY (  `cid` )
 *	) ENGINE = INNODB;
*/

class Customers extends Users
{
	
	//Constructor
	function Customers() {
		parent :: Users();
	}
	
	//Returns the Customer with the given id# as an array
	function getCustomer($id)
	{
		$data = array();
		
		$query = $this->db->get_where('Customers', array('cid'=>$id));
		if($query->num_rows()==0)
			return false;
		$data = $query->row_array();
		
		$query->free_result(); //Free up memory
		$uid = $this->getUid($id);
		return parent::getCustomerInfo($uid,$data); //Get the rest of Customer's data from the User table;
	}
	
	//Returns the Customers Table as an array of arrays
	function getAllCustomers($id)
	{
		$data = array();
		$query = $this->db->get('Customers');
		
		//Check that Table is not empty
		if($query->num_rows() < 0)
			return false;
		
		//Get each customer and store it into an array
		foreach($query->result_array() as $row)
		{
			$cid = $row['cid'];
			$curCustomer = $this->getCustomer($cid);
			$data[] = $curCustomer;
		}
		
		$query->free_result();
		return $data;
	}
	
	//Delete the Customer entirely from both the Customers & Users table
	function deleteCustomer($id)
	{
		$uid = $this->getUid($cid);
		
		$this->db->delete('Customers', array('cid' => $id));
		parent::deleteUser($uid);
		
		return true;
	}
	
	function updateCustomer($cid, $last, $first, $email, $pass, $dob)
	{
		$uid = $this->getUid($cid);
		
		$data = array(
				'Last Name' => $last,
				'First Name' => $first,				
				'Email' => $email,
				'Password' => md5($pass)
				);
		
		//Update the Customers field which are stored in the Parent Users Table
		$this->db->update('Users', $data, array('uid' => $uid));
		//Update the one field which is in the Customers Table
		$this->db->update('Customers', array('DOB' => $dob), array('cid' => $cid));
		
		return true;
	}
	
	//Get the uid of the Customer
	private function getUid($cid)
	{
		$this->db->select('uid');
		$this->db->get('Customers');
		$query = $this->db->where('cid',$cid);
		
		$result = $query->row_array();
		$uid = $result['uid'];
		return $uid;
	}
	
}

?>