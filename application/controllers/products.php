<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
  public $layout = 'main';

  public function show() {
    $this->load->view('products/show');
  }

  public function search() {
    $this->load->view('products/search');
  }
}

