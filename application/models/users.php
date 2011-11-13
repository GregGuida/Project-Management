<?php

/* CREATE TABLE  `CodeIgniter`.`Users` (
 *    `uid` INT NOT NULL AUTO_INCREMENT,
 *     `LastName` VARCHAR( 50 ) NOT NULL ,
 *    `FirstName` VARCHAR( 50 ) NOT NULL ,
 *    `Password` VARCHAR( 25 ) NOT NULL ,
 *     `Email` VARCHAR( 75 ) NOT NULL ,
 *     `DOB` DATE,
 *     `Employee` TINYINT( 1 ) NOT NULL DEFAULT false 
 *   PRIMARY KEY (  `uid` )
 * ) ENGINE = INNODB;
 *
 */

 class Users extends CI_Model {
   
   function __construct() {
     parent::__construct();
   }

  // accepts an optional limit
  // and returns an array of user row arrays
  function all($limit = 0) {
    $users = array();
    $cursor = $this->db->get('Users', $limit);

    foreach($cursor->result_array() as $user) {
      $users[] = $user;
    }
    return $users;
  }


  // accepts a user id
  // returns a user row array if a valid user is found with the id provided
  // or false otherwise
  function find($uid) {

    $result = false;

    $cursor = $this->db->get_where('Users', array('uid' => $uid));

    if($cursor->num_rows() > 0) {
      $result = $cursor->row_array();
      $cursor->free_result();
    }

    return $result; 
  }
  
  
  // acepts lastname, firstname, email, password, employee
  // inserts a new user record into the database
  // returns the new user id if successful
  // or false otherwise
  function create($last, $first, $email, $pass, $employee = 0) {

    $result = false;
    $data = array(
      'LastName'  => $last,
      'FirstName' => $first,
      'Email'      => $email,
      'Password'   => md5($pass),
      'Employee'   => $employee
    );
    
    $this->db->insert('Users', $data);

    if (!$this->db->_error_message()) {
      $result = $this->db->insert_id();
    }

    return $result;
  }

  // accepts email, password
  // returns a user row array if a valid user is found with the email and password provided
  // or false otherwise
  function authenticate($email, $pass) {

    $result = false;

    $cursor = $this->db->get_where('Users', array('Email' => $email));
    $user = $cursor->row_array();
    $encrypted_password = $user['Password'];

    if(md5($pass) == $encrypted_password) {
      $result = $user;
    }

    return $result;
  }

  // accepts id
  // deletes a user with the given id from the database
  // and returns a boolean representing the success of the query
  function destroy($id) {
    $this->db->delete('Users', array('uid' => $id));
    return !!$this->db->_error_message();
  }
 }
 
 ?>
