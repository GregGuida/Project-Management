<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
  public $layout = 'main';

  public function show() {
    $this->load->view('products/show');
  }
  
  public function admin_show() {
    $this->layout = 'admin';
    $this->load->view('products/admin_show');
  }

  public function search() {
    $this->load->view('products/search');
  }
}

