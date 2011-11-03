<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->view('welcome_message');
  }

  // will add a comment to a product specified by $id
  public function create($id = 0) {
    // either ajax or redirect, no view loading...
    $this->load->view('comments/show');
  }

  // will add a rating to a comment specified by $id
  public function rating($id = 0) {
    // either ajax or redirect, no view loading...
    $this->load->view('comments/show');
  }
}

