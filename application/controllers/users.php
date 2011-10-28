<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
  public $layout = 'main';

  // new is a php keyword....
  public function reset_password() {
    $this->layout = 'admin';
    $data = array('js' => 'reset_password.js');
    $this->load->view('users/reset_password', $data);
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
}
