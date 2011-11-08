<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
  public $layout = 'main';
  public $auth = array();

  public function __construct() {
    parent::__construct();
    // Your own constructor code
  }

  function login() {
    $this->load->view('customers/login');
  }

  function signup() {
    $this->load->view('customers/new');
  }

  function forgot_password() {
    $this->load->view('customers/forgot_password');
  }

  function reset_password() {
    $this->layout = 'admin';
    $data = array('js' => 'reset_password.js');
    $this->load->view('customers/reset_password', $data);
  }

  function index() {
    $this->layout = 'admin';
    $this->load->view('customers/index');
  }
  
  function contact() {
    $this->layout = 'admin';
    $this->load->view('customers/contact');
  }
  
  function revoke() {
    $this->layout = 'admin';
    $this->load->view('customers/revoke');
  }

  function show($uid) {
    $customerdetails = array();
    if($query = $this->Users->getCustomerInfo($uid)) {
      $customerdetails['records'] = $query;
    }
    $this->load->view('customers/account', $customerdetails);
  }
}

