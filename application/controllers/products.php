<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
  public $layout = 'main';

  public function show($id) {
    $this->load->model('Product');
    $data = array();

    $data['comments'] = $this->_comments($id);
    $data['votes'] = $this->_votes($id); 
    $data['images'] = $this->_images($id);

    if ( $query = $this->Product->get($id) ) {
       $data['product'] = $query;
    }

    $this->load->view('products/show',$data);
  }

  private function _votes($pid){
    $this->load->model('Votes');
    $votes = array();
    $total = 0;

    if ( $votes = $this->Votes->find($pid) ) {
      foreach( $votes as $vote ) {
        $total += $vote['direction']; 
      }
      return array(count($votes),$total);   
    } else {
      return array(0,0);
    }
  }

  private function _comments($pid) {
    $this->load->model('Comments');
    $comments = array();
    if ( $comments  = $this->Comments->find_by_product($pid,-1) ) {
      return $comments;
    }
  }

  private function _images($pid) {
    $this->load->model('Images');
    $images = array();
    if ( $images = $this->Images->find($pid) ) {
      return $images;
    }
  }

    
  public function admin_show($id) {
    $this->load->model('Product');
    $products = array();

    if( $query = $this->Product->getProductId($id) ) {
       $products['records'] = $query;
    }

    $this->layout = 'admin';
    $this->load->view('products/admin_show', $products);
  }

  public function index($category = "") {
    $this->load->model('Product');
    $products = array();

    if ( $query = $this->Product->getProductId($id) ) {
      $products['records'] = $query;
    }

    $this->load->view('category/show', $products);
  }

  public function admin_browse() {
    $this->load->model('Product');
    $products = array();

    if( $query = $this->Product->getAllProducts() ) {
       $products['records'] = $query;
    }

    $this->layout = 'admin';
    $this->load->view('products/admin_browse', $products);
  }

  public function add() {
    $this->layout = 'admin';
    $this->load->view('products/add');
  }

  public function create(){
    $this->load->model('Product');

    $data = array(
      'Name' => $this->input->post('product-name'),
      'Description' => $this->input->post('product-description'),
      'PriceUSD' => $this->input->post('product-price'),
      'catID' => $this->input->post('product-category'),
    );

    $this->Product->newProduct($data);
    redirect( '/products/admin_show/'.$this->db->insert_id() );
  }

  public function edit() {
    $this->load->model('Product');

    if ( $query = $this->Product->getProductId($id) ) {
      $product['records'] = $query;
    }

    $this->layout = 'admin';
    $this->load->view('products/edit',$product);
  }

  public function update(){
    $this->load->model('Product');

    $data = array(
     'Name' => $this->input->post('Name'),
     'Description' => $this->input->post('Description'),
     'PriceUSD' => $this->input->post('PriceUSD'),
     'catID' => $this->input->post('catID'),
    );

    $this->Product->updateproduct($data);
    $this->load->view('updateproducts');
  }


  public function search() {
    $this->load->view('products/search');
  }

  public function delete($id){
    $this->load->model('Product');
    $this->Product->deleteProduct($id);
    redirect('/products/admin_browse');
  }


  public function add_image( $id ) {
    $this->layout = 'ajax';
    $this->load->view('products/upload_image',$id);
  }


  public function create_image(){
    $config['upload_path'] = './img/products/'.$this->input->post('productID').'/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '100';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload())
    {
      $error = array('error' => $this->upload->display_errors());

      $this->load->view('upload_form', $error);
    }
    else
    {
      $data = array('upload_data' => $this->upload->data());

      $this->load->view('upload_success', $data);
    }
  }

}

?>
