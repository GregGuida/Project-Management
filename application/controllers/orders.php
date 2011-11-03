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
}

