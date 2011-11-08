<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
  public $layout = 'admin';
  public $auth = array('index', 'add', 'edit', 'delete', 'update', 'create');

  // GET - 200
  public function index() {
    $this->load->model('Users');
    $this->load->model('Employees');
    $data = array();
    $data['employees'] = $this->Employees->getAllEmployees();
    $data['js'] = '/libs/jquery.tablesorter.min.js';
    $this->load->view('employees/index', $data);
  }

  // GET - 200
  public function add($id = 0) {
    $this->load->view('employees/new');
  }

  // GET - 200
  public function edit($id = 0) {
    $this->load->view('employees/edit');
  }

  // GET - 200
  public function login() {
    $this->load->view('employees/login');
  }

  // POST - 302 redirect
  public function delete($eid) {
    $this->Users->deleteEmployee($eid);
    redirect('/employees');
  }
  
  // POST - 302 redirect
  public function update() {
    $empdetails = array(
      'LastName' => $this->input->post('lastName'),
      'FirstName' => $this->input->post('firstname'),
      'Email' => $this->input->post('email'),
      'Password' => $this->input->post('password'),
    );
    $this->Products->updateemployee($empdetais);
    redirect('/employees');
  }

  // POST - 302 redirect
  public function create() {
    $empdetails = array(
      'LastName' => $this->input->post('lastname'),
      'FirstName' => $this->input->post('firstname'),
      'Email' => $this->input->post('email'),
      'Password' => $this->input->post('password'),
      'Employee' => 1 // they are certainly an employee if they hit this action // TODO: check auth first
    );
    $this->Products->addemployee($empdetais);
    redirect('/employees');
  }
}

?>
