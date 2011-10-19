<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
  public $layout = 'main';

  // new is a php keyword....
  public function signup() {
    $this->load->view('customers/new');
  }
}

