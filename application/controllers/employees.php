<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
  public $layout = 'admin';

  public function index() {
    $this->load->model('Users');
    $this->load->model('Employees');
    $data = array();
    $data['employees'] = $this->Employees->getAllEmployees();
    $data['js'] = '/libs/jquery.tablesorter.min.js';
    $this->load->view('employees/index', $data);
  }

  public function add($id = 0) {
    $this->load->view('employees/new');
  }

  public function edit($id = 0) {
    $this->load->view('employees/edit');
  }

  public function login() {
    $this->load->view('employees/login');
  }

  /* 
  public function show($eid) {
    $empdetails = array();
    if($query = $this->Users->getEmployee($eid)) {
       $empdetails['records'] = $query;
    }
    $this->load->view('employees/show', $empdetails);
  }
  */
  
  public function delete($eid) {
    $this->Users->deleteEmployee($eid);
    redirect('/employees');
  }
     
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

  public function create() {
    $empdetails = array(
      'LastName' => $this->input->post('lastname'),
      'FirstName' => $this->input->post('firstname'),
      'Email' => $this->input->post('email'),
      'Password' => $this->input->post('password'),
    );
    $this->Products->addemployee($empdetais);
    redirect('/employees');
  }
}

?>
