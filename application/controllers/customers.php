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

  function send_email_reminder() {
    // TODO: send an email to the user
    header('Location: /customers/login');
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

    $this->load->model('Users');
    $confirm = $this->input->post('confirm');
    $lastname = $this->input->post('lastname');
    $firstname = $this->input->post('firstname');
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // make sure the user is 
    if ($confirm == $password && strlen($password) > 0) {
 
      $user_id = $this->Users->create($lastname, $firstname, $email, $password);
      if ($user_id) {
        $user = $this->Users->authenticate($email, $password);
        set_current_user($user);
        header('Location: /');
      } else {
        header('Location: /customers/signup');
      }

    } else {
      header('Location: /customers/signup');
    }
  }
 
  // GET - 200
  // Admin
  function delete($uid) {
    // delete User
    $this->Users->deleteUser($uid);
    header('Location: /users/');
  }
}

