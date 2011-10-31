<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_items extends CI_Controller {
  public $layout = 'main';

  public function admin_browse() {
    $this->layout = "admin";
    $this->load->view('stock_items/admin_browse');
  }

  public function admin_show() {
    $this->layout = "admin";
    $this->load->view('stock_items/admin_show');
  }

}

