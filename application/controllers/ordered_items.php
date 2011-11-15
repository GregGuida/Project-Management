<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ordered_Items extends CI_Controller {
  public $layout = 'main';
  
  public function __construct() {
      parent::__construct();
      // Custom constructor...
    }
    
  // For right now, this is the easiest way to run Unit Tests
  public function test_run() {
      $this->load->library('unit_test');
      $this->load->model('Ordered_Item', 'item');
      
      //Run some tests against the Fixture Data.
      $this->unit->run($this->item->find(1), 'is_array', 'Ordered Item find() General Test', 'Make sure that find() returns an array.');
      $this->unit->run($this->item->find(1), array('OrderNum' => '1', 'cid' => '1', 'stockID' => '27'), 'Ordered Item find(1) Test', 'Make sure that the value of using find(1) returns the data we expect from the database.');
      $this->unit->run(current($this->item->all(100)), array('OrderNum' => '1', 'cid' => '1', 'stockID' => '27'), 'Ordered Item all() test', 'Make sure that the value of using all() returns the data we expect from the database.');
      $this->unit->run($this->item->create(array(array('OrderNum' => '1', 'cid' => '1', 'stockID' => '5'), array('OrderNum' => '1', 'cid' => '1', 'stockID' => '6'))), true, 'Ordered Item create() General Test', 'Make sure that create() returns true and that it works for batches.');
      
      //Pass a report to the view
      $data['test_result'] = $this->unit->report();
      
      $this->load->view('test_runner', $data);
  }
}