
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->view('categories/index');
  }

  public function show($id = 0) {
    $this->load->view('categories/show');
  }

  public function admin_browse() {
    $this->layout = 'admin';
    $this->load->view('categories/admin_browse');
  }

  public function admin_new() {
    $this->layout = 'admin';
    $this->load->view('categories/admin_new');
  }
  
  public function edit($id = 0) {
    $this->layout = 'admin';
    $this->load->view('categories/edit');
  }

  public function delete($id = 0) {
    $this->layout = 'admin';
    redirect('/categories/admin_browse');
  }
}
?>