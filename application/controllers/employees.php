<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->view('employees/index');
  }
}

