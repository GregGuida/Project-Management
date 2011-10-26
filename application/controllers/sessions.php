<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller {
  public $layout = 'main';

  // new is a php keyword...
  public function login() {
    $this->load->view('sessions/new');
  }
}

