<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
  public $layout = 'main';

  // new is a php keyword....
  public function reset_password() {
    $this->layout = 'admin';
    $this->load->view('users/reset_password');
  }
}

