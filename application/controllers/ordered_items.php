<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrderedItems extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->view('welcome_message');
  }
}

