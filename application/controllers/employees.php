<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
  public $layout = 'admin';

  public function index() {
    $data = array('js' => '/libs/jquery.tablesorter.min.js');
    $this->load->view('employees/index', $data);
  }

  public function add($id = 0) {
    $this->load->view('employees/new');
  }

  public function edit($id = 0) {
    $this->load->view('employees/edit');
  }

  public function delete($id = 0) {
    redirect('/employees/');
  }

  public function login() {
    $this->load->view('employees/login');
  }
}

