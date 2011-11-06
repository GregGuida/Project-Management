<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller {
  public $layout = 'admin';

  public function index() {
    $data = array('js' => '/libs/jquery.tablesorter.min.js');
    $this->load->view('employees/index', $data);
  }

  public function add($id = 0) {
    $this->load->view('employees/new');
  }

  public function edit($id = 0) {
    $this->load->view('employees/edit');
  }

  public function delete($id = 0) {
    redirect('/employees/');
  }

  public function login() {
    $this->load->view('employees/login');
  }

  public function Employee($eid)
  {
      $empdetails = array();
      if($query = $this->Users->getEmployee($eid))
      {
         $empdetails['records'] = $query;
      }
      $this->load->view('Employee_view',$empdetails);
  }
  
  public function Employees()
  {
      $empsdetails = array();
      if($query = $this->Users->getAllEmployees())
      {
         $empsdetails['records'] = $query;
      }
      $this->load->view('Employee_view',$empsdetails);
  }
  
   public function deleteEmployee($eid)
   {
	 $this->Users->deleteEmployee($eid);
	 $this->load->view('Welcome_Message');
   }
     
  public function updateEmployee()
   {
      $empdetails = array(
       'LastName' => $this->input->post('LastName'),
       'First Name' => $this->input->post('First Name'),
       'Email' => $this->input->post('Email'),
       'Password' => $this->input->post('Password'),
       );
      $this->Products->updateemployee($empdetais);
      $this->load->view('welcome_meesage');
   }

   public function addEmployee()
   {
      $empdetails = array(
       'LastName' => $this->input->post('LastName'),
       'First Name' => $this->input->post('First Name'),
       'Email' => $this->input->post('Email'),
       'Password' => $this->input->post('Password'),
       );
      $this->Products->addemployee($empdetais);
      $this->load->view('welcome_meesage');
   }
}

?>
