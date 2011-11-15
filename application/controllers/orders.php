<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->view('welcome_message');
  }
  
  public function show() {
      $this->load->view('orders/show');
  }

  public function checkout() {
    $this->load->view('orders/checkout');
  }

  public function complete() {
    $this->load->view('orders/complete');
  }

  public function admin_browse() {
    $this->layout = "admin";
    $data = array('js' => '/libs/jquery.tablesorter.min.js');
    $this->load->view('orders/admin_browse', $data);
  }
  public function admin_show() {
    $this->layout = "admin";
    $this->load->view('orders/admin_show');
  }
  
  public function test_run() {
    $this->load->library('unit_test');
    $this->load->model('Order', 'order');

    //Run some tests against the Fixture Data.
    $this->unit->run($this->order->convert_cart_to_order(1, 1), true, 'Orders convert_cart_to_order() Return Type Test', 'Make sure that convert_cart_to_order() doesn\'t fail.');
    
    //Pass a report to the view
    $data['test_result'] = $this->unit->report();
          
    $this->load->view('test_runner', $data);
  }

}