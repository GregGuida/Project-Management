<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statics extends CI_Controller {
  public $layout = 'main';

  // homepage
  public function index() {
   $this->load->model('Product');
   $this->load->model('Category');
   $products = $this->Product->all(15);
   if (!$products) {
     $products = array();
   }
   $data['products'] = $products;
   $this->load->view('statics/homepage', $data);
  }

  public function help() {
    $this->load->view('statics/help');
  }

  public function about() {
    $this->load->view('statics/about');
  }

  public function legal() {
    $this->load->view('statics/legal');
  }

  public function privacy() {
    $this->load->view('statics/privacy');
  }
}
