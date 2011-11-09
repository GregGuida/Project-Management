<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
  public $layout = 'admin';
  public $auth = array();
  public $admin = array('index', 'add', 'edit', 'delete', 'update', 'create');

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
  function create() {
 
    $this->load->model('Users');
    $confirm = $this->input->post('confirm');
    $lastname = $this->input->post('lastname');
    $firstname = $this->input->post('firstname');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
 
    // make sure the user is 
    if ($confirm == $password && strlen($password) > 0) {

      // TODO: check if user already exists before adding, then you'd just update employee field
      $user_id = $this->Users->create($lastname, $firstname, $email, $password, 1);
      if ($user_id) {
        header('Location: /employees/dashboard');
      } else {
        header('Location: /employees/');
      }
 
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
