<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
  public $layout = 'main';

  // new is a php keyword....
  public function reset_password() {
    $this->layout = 'admin';
    $data = array('js' => 'reset_password.js');
    $this->load->view('users/reset_password', $data);
  }

  public function show($uid) {
    $user = $this->Users->getUser($id)->row();
    $this->load->view('Userinfo',$user);
  }

  public function index() {
    $this->layout = 'admin';
    $this->load->view('users/index');
  }

  public function contact() {
    $this->layout = 'admin';
    $this->load->view('users/contact');
  }

  public function revoke() {
    $this->layout = 'admin';
    $this->load->view('users/revoke');
  }

  public function create() {
    $userdetails = array(
      'LastName' => $this->input->post('LastName'),
      'FirstName' => $this->input->post('FirstName'),
      'Email' => $this->input->post('Email'),
      'Password' => $this->input->post('Password'),
    );
      
    $this->Users_model->add_record($userdetails);
    $this->load->view('Products');
  }

  public function Customer($uid,$data) {
    $customerdetails = array();
    if($query = $this->Users->getCustomerInfo($uid,$data)) {
       $customerdetails['records'] = $query;
    }
    $this->load->view('Customerinfo',$customerdetails);
  }

  public function Employee($eid,$data) {
    $empdetails = array();
    if($query = $this->Users->getEmployeeInfo($eid,$data)) {
       $empdetails['records'] = $query;
    }
    $this->load->view('employees/show',$empdetails);
  }

   public function delete($uid) {
     // delete User
     $this->Users->deleteUser($uid);
     redirect('/users/');
   }
}

?> 
