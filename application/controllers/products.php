<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
  public $layout = 'main';

  public function show($id) {
    $products = array();
    if ( $query = $this->Products->getProductId($id) ) {
       $products['records'] = $query;
    }

    $this->load->view('products/show',$products);
  }
    
  public function admin_show($id) {
    $products = array();
    if( $query = $this->Products->getProductId($id) ) {
       $products['records'] = $query;
    }

    $this->layout = 'admin';
    $this->load->view('products/admin_show', $products);
  }

  public function admin_browse() {
    $products = array();
    if( $query = $this->Products->getAllProducts() ) {
       $products['records'] = $query;
    }
    $this->layout = 'admin';
    $this->load->view('products/admin_browse',$products);
  }

  public function add() {
    $this->layout = 'admin';
    $this->load->view('products/add');
  }

  public function create(){
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
    $this->layout = 'admin';
    $this->load->view('products/edit');
  }

  public function update(){
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
   // delete product
    $this->Products->deleteProduct($id);
    redirect('/products/admin_browse');
  }


  public function upload_image() {
    $this->layout = 'ajax';
    $this->load->view('products/upload_image');
  }
}

?>