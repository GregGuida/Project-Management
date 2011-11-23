<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_tickets extends CI_Controller {
  public $layout = 'main';
  public $auth = array();
  public $admin = array(
    'admin_show' => array('message' => 'Please login'),
    'admin_browse' => array('message' => 'Please login'),
    'add' => array('message' => 'Please login')
  );

  public function admin_browse() {
    $this->layout = "admin";
    $this->load->model('Stock_Ticket', 'ticket');
    
    $data['stock_tickets'] = $this->ticket->all(500);
    $data['js'] = '/libs/jquery.tablesorter.min.js';
    
    $this->load->view('stock_tickets/admin_browse', $data);
  }

  public function admin_show($ticket_num = 0) {
    $this->layout = "admin";
    $this->load->model('Stock_Ticket', 'ticket');
    $this->load->model('Stock_Item', 'item');
    
    $data['stock_ticket'] = $this->ticket->get_ticket_show_info($ticket_num);
    $data['stock_items'] = $this->item->find_by(array('ticketNum' => $ticket_num));
    $data['js'] = '/libs/jquery.tablesorter.min.js';
    
    $this->load->view('stock_tickets/admin_show', $data);
  }

  public function add(){
    $this->layout = "admin";
    $this->load->model('Product', 'product');
    
    $data['products'] = $this->product->all(200);
    
    $this->load->view('stock_tickets/add', $data);
  }
  
  public function create() {
      $this->load->model('Stock_Ticket', 'ticket');
      $rules = array(
        array('field' => 'pid', 'label' => 'Product Type', 'rules' => 'required|is_natural_no_zero'),
        array('field' => 'quantity', 'label' => 'Quantity', 'rules' => 'required|is_natural_no_zero'),
        array('field' => 'unit-price', 'label' => 'Unit Price (USD)', 'rules' => 'trim|required|callback_is_currency')
      );
      $this->form_validation->set_rules($rules);

      if ($this->form_validation->run() == TRUE) {
          $ticket = array(
            'uid' => get_current_user_stuff('uid'),
            'pid' => $this->input->post('pid'),
            'Quantity' => $this->input->post('quantity'),
            'PriceUSD' => $this->input->post('unit-price'),
            'Status' => 'Processing',
            'DateSubmitted' => date('Y-m-d H:i:s', now())
          );
          $ticket_id = $this->ticket->create($ticket);
          
          if($ticket_id !== false) {
              set_message('Congratulations, Stock Ticket successfully added!', 'success');
              header('Location: /stock_tickets/admin_show/'.$ticket_id);
          }
          else {
              set_message('There was an error adding the Stock Ticket. Please try again.', 'error');
              header('Location: /stock_tickets/add');
          }
      }
      else {
          set_message(validation_errors(), 'error');
          header('Location: /stock_tickets/add');
      }
  }
  
  function is_currency($value)
  {
      $this->form_validation->set_message('is_currency', 'The %s is not a valid currency value.');

      $regx = '/^([0-9]|[1-9][0-9]+)\.[0-9]{2}$/';
      if(preg_match($regx, $value))
          return true;
      return false;
  }
  
  public function test_run() {
      $this->load->library('unit_test');
      $this->load->model("Stock_Ticket", "ticket");

      $this->unit->run($this->ticket->find(1), array("ticketNum"=>"1", "pid"=>"1", "uid"=>"2", "PriceUSD"=>"10", "Quantity"=>"2", "DateSubmitted"=>"2011-08-14 00:00:00", "Status"=>"Delivered"), 'Stock Ticket find(1) General Test', 'Test that the find(1) function of the Stock Ticket Model returns the correct object.');
      $this->unit->run($this->ticket->find(0), false, 'Stock Ticket find(0) Return Type Test', 'Test that the find(0) function of the Stock Ticket Model returns \'false\' if the ticket doesn\'t exist.');
      $this->unit->run(count($this->ticket->all(5)), 5, 'Stock Ticket all(5) Limit Test', 'Test that the all function returns the correct limit specified.');
      $this->unit->run(current($this->ticket->all(1)), array("ticketNum"=>"1", "pid"=>"1", "uid"=>"2", "PriceUSD"=>"10", "Quantity"=>"2", "DateSubmitted"=>"2011-08-14 00:00:00", "Status"=>"Delivered"), 'Stock Ticket all(1) General Test', 'Test that the all(1) function of the Stock Ticket Model returns the correct database row.');
      
      //Pass a report to the view
      $data['test_result'] = $this->unit->report();

      $this->load->view('test_runner', $data);
  }

}
