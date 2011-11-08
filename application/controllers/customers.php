<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
  public $layout = 'main';
  public $auth = array('show');
  public $admin = array('reset_password', 'revoke', 'contact', 'index', 'delete');

  public function __construct() {
    parent::__construct();
    // Your own constructor code
  }

  // GET - 200
  function login() {
    $this->load->view('customers/login');
  }

  // GET - 200
  // this is for a customer to request a password reset
  function forgot_password() {
    $this->load->view('customers/forgot_password');
  }

  // GET - 200
  // this is for an admin to manually set the password of another user
  // TODO: needs handler
  // Admin
  function reset_password() {
    $this->layout = 'admin';
    $data = array('js' => 'reset_password.js');
    $this->load->view('customers/reset_password', $data);
  }

  // GET - 200
  // Admin
  function index() {
    $this->layout = 'admin';
    $this->load->view('customers/index');
  }
  
  // GET - 200
  // Admin
  function contact() {
    $this->layout = 'admin';
    $this->load->view('customers/contact');
  }
  
  // GET - 200
  // Admin
  function revoke() {
    $this->layout = 'admin';
    $this->load->view('customers/revoke');
  }

  // GET - 200
  // account page
  // Auth
  function show($uid) {
    $customerdetails = array();

    // TODO: the user data should be in the session already since they are logged in
    // query is unnecessary
    if($query = $this->Users->getCustomerInfo($uid)) {
      $customerdetails['records'] = $query;
    }
    $this->load->view('customers/account', $customerdetails);
  }

  // GET - 200
  function signup() {
    $this->load->view('customers/new');
  }

  // POST - 302 redirect
  // signup handler
  function create() {
    $userdetails = array(
      'LastName' => $this->input->post('LastName'),
      'FirstName' => $this->input->post('FirstName'),
      'Email' => $this->input->post('Email'),
      'Password' => $this->input->post('Password'),
    );
 
    $this->Users_model->add_record($userdetails);
    redirect('/');
  }
 
  // GET - 200
  // Admin
  function delete($uid) {
    // delete User
    $this->Users->deleteUser($uid);
    redirect('/users/');
   }
}

