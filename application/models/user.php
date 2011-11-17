<?php

/* CREATE TABLE  `CodeIgniter`.`Users` (
 *    `uid` INT NOT NULL AUTO_INCREMENT,
 *     `LastName` VARCHAR( 50 ) NOT NULL ,
 *    `FirstName` VARCHAR( 50 ) NOT NULL ,
 *    `Password` VARCHAR( 32 ) NOT NULL ,
 *     `Email` VARCHAR( 75 ) NOT NULL ,
 *     `DOB` DATE,
 *     `Employee` TINYINT( 1 ) NOT NULL DEFAULT false ,
 *     `createdAt` Timestamp NOT NULL,
 *     `Active` TINYINT( 1 ) NOT NULL DEFAULT true,
 *     `Salt` VARCHAR( 32 ),
 *   PRIMARY KEY (  `uid` )
 * ) ENGINE = INNODB;
 *
 */

 class User extends CI_Model {
   
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

  // accepts an optional limit
  // and returns an array of user row arrays where user's active field is 1
  function active($limit = 0) {
    $users = array();
    $cursor = $this->db->get_where('Users', array('Active' => 1),  $limit);

    foreach($cursor->result_array() as $user) {
      $users[] = $user;
    }
    return $users;
  }

  // accepts an optional limit
  // and returns an array of user row arrays where user's employee field is 1
  function employees($limit = 0) {
    $users = array();
    $cursor = $this->db->get_where('Users', array('Employee' => 1),  $limit);

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


  // accepts an associative array of parameters
  // and returns an array of users
  function find_by($data) {
    $users = array();

    $cursor = $this->db->get_where('Users', $data);

    foreach($cursor->result_array() as $user) {
      $users[] = $user;
    }

    return $users;
  }
  
  
  // accepts lastname, firstname, email, password, employee
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


  // accepts a user id and data array
  // updates the matching rows in the database and returns the id if successful
  // or false otherwise
  function update($id, $data) {
    $result = false;

    $this->db->update('Users', $data, array('uid' => $id));

    if (!$this->db->_error_message()) {
      $result = $id;
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

  // accepts a length parameter which determines how many random characters to return
  function randomPassword($length = 8) {
    $password = '';
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $numCharacters = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
      $password .= $characters[mt_rand(0, $numCharacters)];
    }

    return $password;
  }
 }
 
 ?>
