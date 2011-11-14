<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
  public $layout = 'main';
  public $auth = array('show');
  public $admin = array('reset_password', 'reset_password_handle', 'access', 'contact', 'send_email', 'index', 'delete');

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

  // POST - 302 redirect
  // where a user goes after submitting their password for a reset
  function send_email_reminder() {
    $this->load->model('Users');
    $email = $this->input->post('email');
    $users = $this->Users->find_by(array('Email' => $email));
    if (count($users)) {
      $user = $users[0];
      $new_salt = md5(time() . $user['uid']);
      $this->Users->update($user['uid'], array('Salt' => $new_salt));
      $subject = 'TFM password reset';
      $message = "Hi $user[FirstName],<br /><br />You're receiving this email because you've requested a password reset. Please follow the link below to reset your password:<br /><br /> <a href=\"" . $this->config->item('BASE_URL') . "customers/forgot_password_response/$new_salt\">Reset</a>";
      send_mail($user['Email'], $subject, $message);
    }

    header('Location: /customers/login');
  }


  // GET - 200
  // where the reset link in the forgot password email brings you
  function forgot_password_response($salt) {
    $this->load->model('Users');
    $users = $this->Users->find_by(array('Salt' => $salt));
    if (count($users)) {
      
      $data['salt'] = $salt;
      $data['js'] = 'reset_password.js';
      $this->load->view('customers/forgot_password_response', $data);
    } else {
      header('Location: /customers/login');
    }
  }

  // POST - 302 redirect
  function forgot_password_final($salt) {
    $this->load->model('Users');
    $users = $this->Users->find_by(array('Salt' => $salt));
    $password = $this->input->post('password');
    $confirm = $this->input->post('confirm');
    if (count($users) && $password == $confirm && strlen($password) > 0) {
      $user = $users[0];
      $this->Users->update($user['uid'], array('Password' => md5($password)));
    }
    header('Location: /customers/login');
  }


  // GET - 200
  // this is for an admin to manually set the password of another user
  // Admin
  function reset_password($uid) {
    $this->layout = 'admin';
    $this->load->model('Users');
    $user = $this->Users->find($uid);
    $data = array('user' => $user, 'js' => 'reset_password.js');
    $this->load->view('customers/reset_password', $data);
  }

  // POST - 302 redirect
  // Admin
  function reset_password_handle($uid) {
    $this->load->model('Users');
    $user = $this->Users->find($uid);
    $password = $this->input->post('password');
    $confirm = $this->input->post('confirm');
    if ($password == $confirm && strlen($password) > 0) {
      $this->Users->update($user['uid'], array('Password' => md5($password)));
      $subject = 'TFM password reset';
      $message = "Hi $user[FirstName],<br /><br />You're receiving this email because you're password has been reset.<br /><br />Your new password: $password<br /><br />Thank you";
      send_mail($user['Email'], $subject, $message);
      header('Location: /customers/');
    } else {
      header('Location: /customers/reset_password/' . $uid);
    }
  }


  // GET - 200
  // Admin
  function index() {
    $this->layout = 'admin';
    $this->load->model('Users');
    $users = $this->Users->all(30);
    $data = array('users' => $users, 'js' => 'customer_index.js');
    $this->load->view('customers/index', $data);
  }
  
  // GET - 200
  // Admin
  function contact($uid = 0) {
    $this->layout = 'admin';
    $this->load->model('Users');
    $user = $this->Users->find($uid);
    $data = array('user' => $user);
    $this->load->view('customers/contact', $data);
  }

  
  // POST - 302 redirect
  // Admin
  function send_email($uid) {
    $this->load->model('Users');
    $subject = $this->input->post('subject');
    $message = $this->input->post('message');
    $user = $this->Users->find($uid);
    send_mail($user['Email'], $subject, $message);
    header('Location: /customers/');
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

