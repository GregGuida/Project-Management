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
    $data = array(
      'LastName' => $this->input->post('lastname'),
      'FirstName' => $this->input->post('firstname'),
      'Email' => $this->input->post('email'),
      'DOB' => $this->input->post('dob'),
    );
    $this->load->model('Users');
    $this->Users->update($id, $data);
    redirect('/employees/show/' . $id);
  }

  // POST - 302 redirect
  function create() {
    $this->load->model('Users');
    $firstname = $this->input->post('firstname');
    $lastname = $this->input->post('lastname');
    $email = $this->input->post('email');
    $dob = $this->input->post('dob');
 
    $exists = $this->Users->find_by(array('Email' => $email));

    // if the user already exists, just update them to an employee
    if (count($exists) > 0) {

      $user_id = $this->Users->update($exists[0]['uid'], array('Employee' => 1));

    } else {
      // otherwise, create a new user as an employee
      $user_id = $this->Users->create($lastname, $firstname, $email, $password, 1);
    }

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
