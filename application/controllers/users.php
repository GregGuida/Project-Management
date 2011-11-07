<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

  public $layout = 'main';

  function create() {
    $userdetails = array(
      'LastName' => $this->input->post('LastName'),
      'FirstName' => $this->input->post('FirstName'),
      'Email' => $this->input->post('Email'),
      'Password' => $this->input->post('Password'),
    );
      
    $this->Users_model->add_record($userdetails);
    redirect('/');
  }

  function delete($uid) {
    // delete User
    $this->Users->deleteUser($uid);
    redirect('/users/');
   }
}

?> 
