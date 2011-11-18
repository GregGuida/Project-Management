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
  
  public function test_run() {
      $this->load->library('unit_test');
      $this->load->model("Stock_Ticket", "ticket");
      
      $this->unit->run($this->ticket->find(1), array("ticketNum"=>"1", "pid"=>"1", "uid"=>"2", "PriceUSD"=>"10", "NumOrdered"=>"2", "DateSubmitted"=>"2011-11-18 00:23:35", "Status"=>"Delivered"), 'Stock Ticket find(1) General Test', 'Test that the find(1) function of the Stock Ticket Model returns the correct object.');
      $this->unit->run($this->ticket->find(0), false, 'Stock Ticket find(0) General Test', 'Test that the find(0) function of the Stock Ticket Model returns \'false\' if the ticket doesn\'t exist.');
      $this->unit->run(count($this->ticket->all(5)), 5, 'Stock Ticket all(5) General Test', 'Test that the all function returns the correct limit specified.');
      $this->unit->run(current($this->ticket->all(1)), array("ticketNum"=>"1", "pid"=>"1", "uid"=>"2", "PriceUSD"=>"10", "NumOrdered"=>"2", "DateSubmitted"=>"2011-11-18 00:23:35", "Status"=>"Delivered"), 'Stock Ticket find(0) General Test', 'Test that the all(1) function of the Stock Ticket Model returns the correct database row.');
      
      //Pass a report to the view
      $data['test_result'] = $this->unit->report();

      $this->load->view('test_runner', $data);
  }

}
