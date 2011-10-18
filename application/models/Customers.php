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
	
	//Returns the Customer with the given id# as an array of objects
	function getCustomer($id)
	{
		$query = $this->db->get_where('Customers', array('cid'=>$id));
		if($query->num_rows()==0)
			return false;
		$result = $query->result();
		
		$query->free_result(); //Free our mind
		return $result[0]; //There should Never be more than one row... But just in case.
	}
	
	//Returns the Customers Table
	function getAllCustomers($id)
	{
		$data = array();
		$query = $this->db->get('Customers');
		
		if($query->num_rows() < 0)
			return false;
		
		foreach($query->result() as $row)
			$data[] = $row;		
		
		$query->free_result();
		return $data;
	}
	
	function deleteCustomer($id)
	{
		$this->db->delete('Customers', array('cid' => $id));
	}
	
	function updateCustomer($cid, $last, $first, $email, $pass, $dob)
	{
		//Get the uid of the Customer
		$this->db->select('uid');
		$this->db->get('Customers');
		$uid = $this->db->where('cid',$cid);
		
		$data = array(
				'LastName' => $last,
				'FirstName' => $first,				
				'Email' => $email,
				'Password' => $pass,
				);
		
		//Update the Customers field which are stored in the Parent Users Table
		$this->db->update('Users', $data, array('uid' => $uid));
		//Update the one field which is in the Customers Table
		$this->db->update('Customers', array('DOB' => $dob), array('cid' => $cid));
		
		return true;
	}
	
}

?>