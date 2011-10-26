<?php

/* CREATE TABLE  `CodeIgniter`.`Users` (
 *		`uid` INT NOT NULL AUTO_INCREMENT,
 * 		`Last Name` VARCHAR( 50 ) NOT NULL ,
 *		`First Name` VARCHAR( 50 ) NOT NULL ,
 *		`Password` VARCHAR( 25 ) NOT NULL ,
 * 		`Email` VARCHAR( 75 ) NOT NULL ,
 *	 PRIMARY KEY (  `uid` )
 * ) ENGINE = INNODB;
 *
 */

 class Users extends Model
 {
 	
 	function Users(){
 		parent :: Model();
 	}
 	
 	protected function getCustomerInfo($uid, $data)
	{
		$userData = array();
		
		$query = $this->db->get_where('Users', array('uid'=>$uid));
		if($query->num_rows()==0)
			return false;
		$userData = $query->row_array();
		
		$query->free_result(); //Free our mind
		
		$result = array_merge($userData,$data);
		return $result;
	}
	
	protected function getEmployeeInfo($eid, $data)
	{
		$userData = array();
		
		$query = $this->db->get_where('Users', array('eid'=>$eid));
		if($query->num_rows()==0)
			return false;
		$userData = $query->row_array(); //Row because there should only be 1
		
		$query->free_result();
		
		$result = array_merge($userData,$data);
		return $result;
	}
	
	function getUser($uid)
	{
		$query = $this->db->get_where('Users', array('uid'=>$uid));
		if($query->num_rows()==0)
			return false;
		$result = $query->row_array();
		
		$query->free_result();
		return $result; 
	}
	
	function deleteUser($id)
	{
		$this->db->delete('Users', array('uid' => $id));
	}
	
 }
 
 ?>