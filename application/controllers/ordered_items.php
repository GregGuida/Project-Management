<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ordered_Items extends CI_Controller {
  public $layout = 'main';
  
  public function __construct() {
      parent::__construct();
      // Custom constructor...
    }

  public function index() {
      $this->load->model('Ordered_Item', 'item');
      $data = $this->item->find(1);
      echo $data;
  }
  
  public function test_run() {
      $this->load->library('unit_test');
      
      //Run some tests
      $this->unit->run('Foo', 'is_string');
      
      //Pass a report to the view
      $data['test_result'] = $this->unit->report();
      
      $this->load->view('test_runner', $data);
  }
}

