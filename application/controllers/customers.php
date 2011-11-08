<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {
  public $layout = 'main';

  public function signup() {
    $this->load->view('customers/new');
  }

  public function forgot_password() {
    $this->load->view('customers/forgot_password');
  }

  public function reset_password() {
    $this->layout = 'admin';
    $data = array('js' => 'reset_password.js');
    $this->load->view('customers/reset_password', $data);
  }

  public function index() {
    $this->layout = 'admin';
    $this->load->view('customers/index');
  }
  
  public function contact() {
    $this->layout = 'admin';
    $this->load->view('customers/contact');
  }
  
  public function revoke() {
    $this->layout = 'admin';
    $this->load->view('customers/revoke');
  }

  public function show($uid,$data) {
    $customerdetails = array();
    if($query = $this->Users->getCustomerInfo($uid,$data)) {
      $customerdetails['records'] = $query;
    }
    $this->load->view('customers/account', $customerdetails);
  }
}

