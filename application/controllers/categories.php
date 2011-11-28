
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
  public $layout = 'main';

  public function index( ) {
    $this->load->model('Category');
    $data = array();

    if ( $query = $this->Category->get_top() ) {
      $data['categories'] = $query;
    }

    $this->load->view('categories/index',$data);
  }

  public function show($id) {
    $this->load->model('Product');
    $this->load->model('Category');
    $data = array();

    if ($products = $this->Product->find_by_category($id)){
      $data['products'] = $products;
    }

    if ($categories = $this->Category->get_top()){
      $data['categories'] = $categories;
    }

    if ($children = $this->Category->get_children($id)){
      $data['child_cats'] = $children;
    }

    if ($this_category = $this->Category->get($id)){
      $data['this_category'] = $this_category;
    }

    $this->load->view('categories/show',$data);
  }

  private function _images($pid) {
    $this->load->model('Images');
    $images = array();
    if ( $images = $this->Images->find($pid) ) {
      return $images;
    }
  }

  public function admin_browse() {
    $this->load->model('Category');
    $data = array();

    if ( $query = $this->Category->all() ) {
      $data['categories'] = $query;
    }

    $this->layout = 'admin';
    $this->load->view('categories/admin_browse',$data);
  }

  public function admin_new() {
    $this->load->model('Category');
    $data = array();

    if ( $query = $this->Category->all() ) {
      $data['categories'] = $query;
    }

    $this->layout = 'admin';
    $this->load->view('categories/admin_new',$data);
  }

  public function create() {
    $this->load->model('Category');

    if ( $this->input->post('parent') == 'NULL' ) {
      $this->Category->add( $this->input->post('name') );
    } else {
      $this->Category->add( $this->input->post('name'), $this->input->post('parent') );
    }

        
    redirect( '/categories/admin_browse/' );
  }
  
  public function edit($id) {
    $this->load->model('Category');
    $data = array();

    if ( $query = $this->Category->all() ) {
      $data['categories'] = $query;
    }

    if ( $theCat = $this->Category->get($id) ) {
      $data['this_category'] = $theCat;
    }

    $this->layout = 'admin';
    $this->load->view('categories/edit', $data );
  }

  public function update($id) {
    $this->load->model('Category');

    if ( $this->input->post('parent') == 'NULL' ) {
      $this->Category->update( $id, $this->input->post('name') );
    } else {
      $this->Category->update( $id, $this->input->post('name'), $this->input->post('parent') );
    }
        
    redirect( '/categories/admin_browse/' );    
  }

  public function delete($id) {
    $this->load->model('Category');

    $this->layout = 'admin';
    redirect('/categories/admin_browse');
  }
}
?>
