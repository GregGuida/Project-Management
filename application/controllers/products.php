<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
  public $layout = 'main';

  public function show() {
    $products = array();
      if($query = $this->Products->getAllProducts())
      {
         $products['records'] = $query;
      }

    $this->load->view('products/show',$products);
  }
  
  public function admin_show() {
    $data = array();
      if($query = $this->Products->getAllProducts())
      {
         $data['records'] = $query;
      }
    $this->layout = 'admin';
    $this->load->view('products/admin_show');
  }

  public function search() {
    $this->load->view('products/search');
  }
}


  public function deleteProduct($id){
	 // delete product
	 $this->Products->deleteProduct($id);
	 
	 $this->load->view('Products');
  }

  public function newProduct(){
      $data = array(
       'Name' => $this->input->post('Name'),
       'Description' => $this->input->post('Description'),
       'PriceUSD' => $this->input->post('PriceUSD'),
       'catID' => $this->input->post('catID'),
       );
      $this->Products->newproduct($data);
      $this->load->view('addproducts');
  }

  public function updateProduct(){
      $data = array(
       'Name' => $this->input->post('Name'),
       'Description' => $this->input->post('Description'),
       'PriceUSD' => $this->input->post('PriceUSD'),
       'catID' => $this->input->post('catID'),
       );
      $this->Products->updateproduct($data);
      $this->load->view('updateproducts');
 }

?>
