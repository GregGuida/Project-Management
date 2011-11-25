<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statics extends CI_Controller {
  public $layout = 'main';

  // homepage
  public function index() {
    $this->load->model('Products');
    $products = array();

    if( $query = $this->Products->getRandomProduct() ) {
       $products['records'] = $query;
    }

    //$this->layout = 'admin';
    $this->load->view('statics/homepage',$products);
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
