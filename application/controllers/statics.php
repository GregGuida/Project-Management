<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statics extends CI_Controller {
  public $layout = 'main';

  // homepage
  public function index() {
   $this->load->view('statics/homepage');
  }

  public function admin() {
    $this->load->view('statics/admin_dashboard');
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

