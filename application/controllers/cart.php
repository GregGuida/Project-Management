<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->view('cart/show');
  }
}