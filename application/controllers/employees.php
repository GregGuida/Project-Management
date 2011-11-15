<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
  public $layout = 'admin';
  public $auth = array();
  public $admin = array('index', 'add', 'edit', 'delete', 'update', 'create');

  // GET - 200
  function index() {
    $this->load->model('Users');
    $data = array();
    $data['employees'] = $this->Users->employees(50);
    $data['js'] = '/libs/jquery.tablesorter.min.js';
    $this->load->view('employees/index', $data);
  }

  // GET - 200
  function add($id = 0) {
    $this->load->view('employees/new');
  }

  // GET - 200
  function edit($id = 0) {
    $this->load->model('Users');
    $data = array();
    $data['employee'] = $this->Users->find($id);
    $this->load->view('employees/edit', $data);
  }

  // GET - 200
  function login() {
    $this->load->view('employees/login');
  }

  // POST - 302 redirect
  function delete($id) {
    $this->load->model('Users');
    $this->Users->destroy($id);
    header('Location: /employees');
  }
  
  // POST - 302 redirect
  function update($id) {
    $data = array(
      'FirstName' => $this->input->post('firstname'),
      'LastName' => $this->input->post('lastname'),
      'Email' => $this->input->post('email'),
      'DOB' => $this->input->post('dob'),
    );
    $this->load->model('Users');
    $user_id = $this->Users->update($id, $data);
    if ($user_id) {
      header('Location: /employees/');
    } else {
      header('Location: /employees/edit/' . $id);
    }
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
      $newPassword = $this->Users->randomPassword();
      $user_id = $this->Users->create($lastname, $firstname, $email, $newPassword, 1);
    }

    if ($user_id) {
      header('Location: /employees/');
    } else {
      header('Location: /employees/add');
    }
  }

  // GET
  // Admin
  function dashboard() {
    $this->layout = 'admin';
    $data = array();
    $data['js'] =array('libs/highcharts.js', 'admin_dashboard.js');
    $this->load->view('employees/dashboard', $data);
  }
}

?>
