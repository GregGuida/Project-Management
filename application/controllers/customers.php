<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
  public $layout = 'main';
  public $auth = array('show');
  public $admin = array('reset_password', 'access', 'contact', 'index', 'delete');

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

  function send_email($uid) {
    header('Location: /customers/');
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
  // TODO
  function index() {
    $this->layout = 'admin';
    $this->load->model('Users');
    $users = $this->Users->all(30);
    $data = array('users' => $users, 'js' => 'customer_index.js');
    $this->load->view('customers/index', $data);
  }
  
  // GET - 200
  // Admin
  // TODO: needs handler
  function contact($uid = 0) {
    $this->layout = 'admin';
    $this->load->model('Users');
    $user = $this->Users->find($uid);
    $data = array('user' => $user, 'js');
    $this->load->view('customers/contact', $data);
  }
  
  // GET - 200
  // Admin
  function access($uid) {
    $this->layout = 'admin';
    $this->load->model('Users');
    $data = array();
    $data['user'] = $this->Users->find($uid);
    $this->load->view('customers/access', $data);
  }

  // POST - 302 redirect
  // admin
  function access_handler($uid) {
    $this->layout = 'admin';
    $this->load->model('Users');

    $active = $this->input->post('active');
    $this->Users->update($uid, array('Active' => $active));
    header('Location: /customers/');
  }

  // GET - 200
  // account page
  // Auth
  function show($uid) {
    // TODO: load 
    $this->load->view('customers/account');
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
    $this->load->model('Users');
    $this->Users->destroy($uid);
    header('Location: /Customers/');
  }
}

