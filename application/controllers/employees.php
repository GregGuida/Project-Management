<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
  public $layout = 'admin';

  public function index() {
    $data = array('js' => '/libs/jquery.tablesorter.min.js');
    $this->load->view('employees/index', $data);
  }

  public function add() {
    $this->load->view('employees/new');
  }
}

