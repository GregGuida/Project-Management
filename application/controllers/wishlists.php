<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WishLists extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->view('wishlists/index');
  }
  
  public function show() {
    $this->load->view('wishlists/show');
  }
}

