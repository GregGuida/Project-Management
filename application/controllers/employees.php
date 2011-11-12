<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
  public $layout = 'admin';
  public $auth = array();
  public $admin = array('index', 'add', 'edit', 'delete', 'update', 'create');

  // GET - 200
  public function index() {
    $this->load->model('Users');
    $data = array();
    $data['employees'] = $this->Users->employees(50);
    $data['js'] = '/libs/jquery.tablesorter.min.js';
    $this->load->view('employees/index', $data);
  }

  // GET - 200
  public function add($id = 0) {
    $this->load->view('employees/new');
  }

  // GET - 200
  public function edit($id = 0) {
    $this->load->model('Users');
    $data = array();
    $data['employee'] = $this->Users->find($id);
    $this->load->view('employees/edit', $data);
  }

  // GET - 200
  public function login() {
    $this->load->view('employees/login');
  }

  // POST - 302 redirect
  public function delete($id) {
    $this->load->model('Users');
    $this->Users->delete($id);
    redirect('/employees');
  }
  
  // POST - 302 redirect
  public function update($id) {
    $empdetails = array(
      'LastName' => $this->input->post('lastname'),
      'FirstName' => $this->input->post('firstname'),
      'Email' => $this->input->post('email'),
      'DOB' => $this->input->post('dob'),
    );
    $this->load->model('Users');
    $this->Users->update($id, $empdetails);
    redirect('/employees/show/' . $id);
  }

  // POST - 302 redirect
  function create() {
 
    $this->load->model('Users');
    $lastname = $this->input->post('lastname');
    $firstname = $this->input->post('firstname');
    $email = $this->input->post('email');
    $dob = $this->input->post('dob');
 
    // TODO: check if user already exists before adding, then you'd just update employee field
    $user_id = $this->Users->create($lastname, $firstname, $email, $password, 1);
    if ($user_id) {
      header('Location: /employees/dashboard');
    } else {
      header('Location: /employees/add');
    }
  }

  public function dashboard() {
    $this->layout = 'admin';
    $data = array();
    $data['js'] =array('libs/highcharts.js', 'admin_dashboard.js');
    $this->load->view('employees/dashboard', $data);
  }
}

?>
