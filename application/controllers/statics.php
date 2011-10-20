<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statics extends CI_Controller {
  public $layout = 'main';

  // homepage
  public function index() {
 
   $this->load->view('statics/homepage');
  }
}

