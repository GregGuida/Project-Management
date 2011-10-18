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
 	
 	protected function getCustomerInfo($cid, $data)
	{
		$query = $this->db->get_where('Users', array('cid'=>$cid));
		if($query->num_rows()==0)
			return false;
		$result = $query->result();
		
		$query->free_result(); //Free our mind
		return $result[0]; //There should Never be more than one row... But just in case.
	}
	
	protected function getEmployeeInfo($eid, $data)
	{
		$query = $this->db->get_where('Users', array('eid'=>$eid));
		if($query->num_rows()==0)
			return false;
		$result = $query->result();
		
		$query->free_result(); //Free our mind
		return $result[0]; 
	}
	
	function getUser($uid)
	{
		$query = $this->db->get_where('Users', array('uid'=>$uid));
		if($query->num_rows()==0)
			return false;
		$result = $query->result();
		
		$query->free_result(); //Free our mind
		return $result[0]; 
	}
	
	function deleteUser($id)
	{
		$this->db->delete('Users', array('uid' => $id));
	}
	
 }
 
 ?>