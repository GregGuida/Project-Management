<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_tickets extends CI_Controller {
  public $layout = 'main';

  public function admin_browse() {
    $this->layout = "admin";
    $this->load->view('stock_tickets/admin_browse');
  }

  public function admin_show() {
    $this->layout = "admin";
    $this->load->view('stock_tickets/admin_show');
  }

  public function admin_add(){
    $this->layout = "admin";
    $this->load->view('stock_tickets/admin_add');
  }

}
