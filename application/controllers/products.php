<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
  public $layout = 'main';

  public function show($id) {
    $this->load->model('Products');
    $products = array();

    $data['comments'] =comments($id);
    $data['votes'] = __votes($id); 
    if ( $query = $this->Products->getProductId($id) ) {
       $data['products'] = $query;
    }

    $this->load->view('products/show',$products);
  }

  public function __votes($pid){
    $this->load->model('Votes');
    $votes = array();
    $total = 0;

    if ( $votes = $this->Votes->find($pid,1) ) {
      foreach( $votes as $vote ) {
        $total += $vote['direction']; 
      }
      return array(count($votes),$total);   
    } else {
      return array(0,0);
    }
  }

  public function comments($pid) {
    $this->load->model('Comments');
    $comments = array();
    $this->layout = 'ajax';
    if ( $comments  = $this->Comments->find($pid,-1) ) {
      foreach ( $comments as $comment ) {
        echo $comment;
      }
    }

  }
    
  public function admin_show($id) {
    $this->load->model('Products');
    $products = array();

    if( $query = $this->Products->getProductId($id) ) {
       $products['records'] = $query;
    }

    $this->layout = 'admin';
    $this->load->view('products/admin_show', $products);
  }

  public function index($category = "") {
    $this->load->model('Products');
    $products = array();

    if ( $query = $this->Products->getProductId($id) ) {
      $products['records'] = $query;
    }

    $this->load->view('category/show', $products);
  }

  public function admin_browse() {
    $this->load->model('Products');
    $products = array();

    if( $query = $this->Products->getAllProducts() ) {
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
    $this->load->model('Products');

    $data = array(
      'Name' => $this->input->post('product-name'),
      'Description' => $this->input->post('product-description'),
      'PriceUSD' => $this->input->post('product-price'),
      'catID' => $this->input->post('product-category'),
    );

    $this->Products->newProduct($data);
    redirect( '/products/admin_show/'.$this->db->insert_id() );
  }

  public function edit() {
    $this->load->model('Products');

    if ( $query = $this->Products->getProductId($id) ) {
      $product['records'] = $query;
    }

    $this->layout = 'admin';
    $this->load->view('products/edit',$product);
  }

  public function update(){
    $this->load->model('Products');

    $data = array(
     'Name' => $this->input->post('Name'),
     'Description' => $this->input->post('Description'),
     'PriceUSD' => $this->input->post('PriceUSD'),
     'catID' => $this->input->post('catID'),
    );

    $this->Products->updateproduct($data);
    $this->load->view('updateproducts');
  }


  public function search() {
    $this->load->view('products/search');
  }

  public function delete($id){
    $this->load->model('Products');
    $this->Products->deleteProduct($id);
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
