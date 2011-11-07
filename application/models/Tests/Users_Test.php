<?php

class Users_Test
{
	$this->load->library('unit_test');
	$u1 = new Users();
	
	$test1 = $u1->addUser('Test','Test','Test@testing.com','password123');
	$test2 = $u1->getUser(1);
	$test3 = $u1->authenticateUser('Test@testing.com','password123');
	$test4 = $u1->deleteUser(1);
	
	$this->unit->run($test1,'is_int','Test inserting user');
	$this->unit->run($test2,'is_array','Test getting user');
	$this->unit->run($test3,true,'Test user authentication');
	$this->unit->run($test4,true,'Test deleting user');
}

?>