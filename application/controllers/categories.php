<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->view('categories/index');
  }

  public function show($id = 0) {
    $this->load->view('categories/show');
  }
}

