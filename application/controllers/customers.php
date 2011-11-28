<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
  public $layout = 'main';
  public $auth = array(
    'show' => array('message' => 'You need to Login before viewing your account', 'redirect' => '/customers/login')
  );
  public $admin = array(
    'reset_password' => array(),
    'reset_password_handle' => array(),
    'access' => array(),
    'access_handler' => array(),
    'send_email' => array(),
    'index' => array(),
    'delete' => array(),
    'contact' => array()
  );

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
    $rules = array(
      array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email')
    );
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) {

      $this->load->model('User');
      $email = $this->input->post('email');
      $users = $this->User->find_by(array('Email' => $email));

      if (count($users)) {
        $user = $users[0];
        $new_salt = md5(time() . $user['uid']);
        $this->User->update($user['uid'], array('Salt' => $new_salt));
        $subject = 'TFM password reset';
        $message = "Hi $user[FirstName],<br /><br />You're receiving this email because you've requested a password reset. Please follow the link below to reset your password:<br /><br /> <a href=\"" . $this->config->item('BASE_URL') . "customers/forgot_password_response/$new_salt\">Reset</a>";
        send_mail($user['Email'], $subject, $message);
      }

      set_message('Password reset email sent. Please check your inbox', 'success');
      header('Location: /customers/forgot_password');
    } else {
      set_message(validation_errors(), 'error');
      header('Location: /customers/forgot_password');
    }
  }


  // GET - 200
  // where the reset link in the forgot password email brings you
  function forgot_password_response($salt) {
    $this->load->model('User');
    $users = $this->User->find_by(array('Salt' => $salt));
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
    $rules = array(
      array('field' => 'password', 'label' => 'Password', 'rules' => 'required'),
      array('field' => 'confirm', 'label' => 'Password Confirmation', 'rules' => 'required')
    );
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) {

      $this->load->model('User');
      $users = $this->User->find_by(array('Salt' => $salt));
      $password = $this->input->post('password');
      $confirm = $this->input->post('confirm');

      if (count($users) && $password == $confirm && strlen($password) > 0) {
        $user = $users[0];
        $this->User->update($user['uid'], array('Password' => md5($password)));
        set_message('Password reset successfully', 'success');
        header('Location: /customers/login');
      }
    } else {
      set_message(validation_errors(), 'error');
      header('Location: /customers/forgot_password_response/' . $salt);
    }
  }


  // GET - 200
  // this is for an admin to manually set the password of another user
  // Admin
  function reset_password($uid) {
    $this->layout = 'admin';
    $this->load->model('User');
    $user = $this->User->find($uid);
    $data = array('user' => $user, 'js' => 'reset_password.js');
    $this->load->view('customers/reset_password', $data);
  }

  // POST - 302 redirect
  // Admin
  function reset_password_handle($uid) {
    $rules = array(
      array('field' => 'password', 'label' => 'Password', 'rules' => 'required'),
      array('field' => 'confirm', 'label' => 'Password Confirmation', 'rules' => 'required')
    );
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) {

      $this->load->model('User');
      $user = $this->User->find($uid);
      $password = $this->input->post('password');
      $confirm = $this->input->post('confirm');

      if ($password == $confirm) {

        $this->User->update($user['uid'], array('Password' => md5($password)));
        $subject = 'TFM password reset';
        $message = "Hi $user[FirstName],<br /><br />You're receiving this email because you're password has been reset.<br /><br />Your new password: $password<br /><br />Thank you";
        send_mail($user['Email'], $subject, $message);
        set_message('Customer password reset successful', 'success');
        header('Location: /customers/');
      } else {
        set_message('Error resetting the customer\'s password', 'error');
        header('Location: /customers/reset_password/' . $uid);
      }
    } else {
      set_message(validation_errors(), 'error');
      header('Location: /customers/reset_password/' . $uid);
    }
  }


  // GET - 200
  // Admin
  function index() {
    $this->layout = 'admin';
    $this->load->model('User');
    $users = $this->User->all(30);
    $data = array('users' => $users, 'js' => 'customer_index.js');
    $this->load->view('customers/index', $data);
  }
  
  // GET - 200
  // Admin
  function contact($uid = 0) {
    $this->layout = 'admin';
    $this->load->model('User');
    $user = $this->User->find($uid);
    $data = array('user' => $user);
    $this->load->view('customers/contact', $data);
  }

  
  // POST - 302 redirect
  // Admin
  function send_email($uid) {
    $rules = array(
      array('field' => 'subject', 'label' => 'Subject', 'rules' => 'required'),
      array('field' => 'message', 'label' => 'Message', 'rules' => 'required')
    );
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) {
      $this->load->model('User');
      $subject = $this->input->post('subject');
      $message = $this->input->post('message');
      $user = $this->User->find($uid);
      send_mail($user['Email'], $subject, $message);
      set_message('Message successfully sent to customer', 'success');
      header('Location: /customers/');
    } else {
      set_message(validation_errors(), 'error');
      header('Location: /customers/contact/' . $uid);
    }
  }


  // GET - 200
  // Admin
  function access($uid) {
    $this->layout = 'admin';
    $this->load->model('User');
    $data = array();
    $data['user'] = $this->User->find($uid);
    $this->load->view('customers/access', $data);
  }

  // POST - 302 redirect
  // admin
  function access_handler($uid) {

    $this->layout = 'admin';
    $this->load->model('User');

    $active = $this->input->post('active');
    $this->User->update($uid, array('Active' => $active));
    set_message('Successfully ' . ($active ? 'enabled' : 'disabled') . ' customer\'s account', 'success');
    header('Location: /customers/');
  }
  
  // GET - 200
  // account page
  function show() {
    $this->load->model('cart_item');
    $this->load->model('order');
    $this->load->model('ordered_item');
    //$this->load->model('WishList', 'wishlist');
    $data = array();
    
    //Fill data array with the info we need
    $data['cart'] = $this->cart_item->getDisplayArray(get_current_user_stuff('uid'));
    $data['numItems'] = $this->cart_item->numItems(get_current_user_stuff('uid'));
    
    // Get the users orders
    $orders = $this->order->find_by(array("uid" => get_current_user_stuff('uid')));
    
	$data['activeOrders'] = array_filter($orders, array($this, "is_not_delivered"));
    $data['prevOrders'] = array_filter($orders, array($this, "is_delivered"));
    
	//$data['wishLists'] = $this->wishlist->getListsOfUsers(get_current_user_stuff('uid'));
    
    $this->load->view('customers/account', $data);
  }

  // GET - 200
  function signup() {
    $this->load->view('customers/new');
  }

  // POST - 302 redirect
  // signup handler
  function create() {

    $rules = array(
      array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'),
      array('field' => 'password', 'label' => 'Paswsord', 'rules' => 'required'),
      array('field' => 'confirm', 'label' => 'Password Confirmation', 'rules' => 'required'),
      array('field' => 'firstname', 'label' => 'First Name', 'rules' => 'required'),
      array('field' => 'lastname', 'label' => 'Last Name', 'rules' => 'required')
    );
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) {

      $this->load->model('User');
      $confirm = $this->input->post('confirm');
      $lastname = $this->input->post('lastname');
      $firstname = $this->input->post('firstname');
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      // make sure the user is 
      if ($confirm == $password && strlen($password) > 0) {
 
        $user_id = $this->User->create($lastname, $firstname, $email, $password);
        if ($user_id) {
          $user = $this->User->authenticate($email, $password);
          set_current_user($user);
          set_message('Thanks for signing up! Welcome to TFM Commerce', 'success');
          header('Location: /');
        } else {
          set_message('Error signing up. Please try again', 'error');
          header('Location: /customers/signup');
        }

      } else {
        set_message('Oops, your password is invalid. Passwords must be greater than 0 characters and must match confirmation', 'error');
        header('Location: /customers/signup');
      }
    } else {
      set_message(validation_errors(), 'error');
      header('Location: /customers/signup');
    }
  }
 
  // GET - 200
  // Admin
  function delete($uid) {
    $this->load->model('User');
    $this->User->destroy($uid);
    set_message('Successfully deleted customer', 'error');
    header('Location: /Customers/');
  }
  
  function is_not_delivered($var) { 
      return $var['Status'] !== "Delivered"; 
  }
  
  function is_delivered($var) { 
      return $var['Status'] === "Delivered"; 
  }

  
  function test_run() {
      $this->load->library('unit_test');
      $this->load->model('User', 'item');
      
      $date1 = date('Y-m-d H:i:s',mktime(0,17,35,11,15,2011));
      //Run some tests against the Fixture Data.
      $this->unit->run($this->item->all(), 'is_array', 'User all() General test', 'Make sure that all() returns an array.');
      $this->unit->run(count($this->item->all(0)), 0, 'User all(0) limit test', 'Make sure that all(0) returns 0 results.');
      $this->unit->run(count($this->item->all(1)), 1, 'User all(1) limit test', 'Make sure that all(1) returns 1 result.');
      $this->unit->run(count($this->item->all(2)), 2, 'User all(2) limit test', 'Make sure that all(2) returns 2 result.');
      $this->unit->run(count($this->item->active(0)), 0, 'User active(0) limit test', 'Make sure that active(0) returns 0 active results.');
      $this->unit->run(count($this->item->active(1)), 1, 'User active(1) limit test', 'Make sure that active(1) returns 1 active result.');
      $this->unit->run(count($this->item->employees(0)), 0, 'User employees(0) limit test', 'Make sure that employee(0) returns 0 employee results.');
      $this->unit->run(count($this->item->employees(1)), 1, 'User employees(1) limit test', 'Make sure that employee(1) returns 1 employee result.');
      $this->unit->run(count($this->item->find(1)), 1, 'User find(1) count test', 'Make sure that find(1) returns 1 result.');
      $this->unit->run($this->item->find(100000), false, 'User find(100000) count test', 'Make sure that find(100000) returns false.');
      $this->unit->run(count($this->item->find(1)), array('FirstName' => 'Test', 'LastName' => 'McTester', 'Email' => 'test@fakeemail.com', 'Password' => 'password', 'Active' => 1, 'Employee' => 0), 'User find(1) test', 'Make sure that find(1) returns the correct row.');
      $this->unit->run($this->item->destroy(1), true, 'User destroy(1) test', 'Make sure that destroy(1) returns true.');
      
      //Pass a report to the view
      $data['test_result'] = $this->unit->report();
      
      $this->load->view('test_runner', $data);
  }
}

