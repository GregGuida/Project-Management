<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->view('welcome_message');
  }

  public function checkout() {
    $this->load->view('orders/checkout');
  }

  public function complete() {
    $this->load->view('orders/complete');
  }

  public function admin_browse() {
    $this->layout = "admin";
    $this->load->view('orders/admin_browse');
  }
  public function admin_show() {
    $this->layout = "admin";
    $this->load->view('orders/admin_show');
  }

}

