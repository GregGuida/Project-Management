<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
  public $layout = 'main';
  public $auth = array();
  public $admin = array(
    'admin_browse' => array(),
    'admin_show' => array(),
    'destroy' => array(),
    'update' => array(),
    'edit' => array(),
    'add' => array(),
    'create' => array(),
    'add_image' => array(),
    'create_image' => array()
  );

  public function show($id) {
    $this->load->model('Product');
    $data = array();

    $data['comments'] = $this->_comments($id);
    $data['votes'] = $this->_votes($id); 
    $data['images'] = $this->_images($id);

    if ( $query = $this->Product->get($id) ) {
       $data['product'] = $query;
    }

    $data['js'] = 'products.js';

    $this->load->view('products/show',$data);
  }

  private function _votes($pid){
    $this->load->model('Vote');
    $votes = array();
    $total = 0;

    if ( $votes = $this->Vote->find($pid) ) {
      foreach( $votes as $vote ) {
        $total += $vote['direction']; 
      }
      return array(count($votes),$total);   
    } else {
      return array(0,0);
    }
  }

  private function _comments($pid) {
    $this->load->model('Comment');
    $comments = array();
    if ( $comments  = $this->Comment->find_by_product($pid,-1) ) {
      return $comments;
    }
  }

  private function _images($pid) {
    $this->load->model('Image');
    $images = array();
    if ( $images = $this->Image->find($pid) ) {
      return $images;
    }
  }

    
  public function admin_show($id) {
    $this->load->model('Product');
    $this->load->model('Vote');
    
    $data = array();
    
    $data['comments'] = $this->_comments($id);
    $data['images'] = $this->_images($id);

    if ( $query = $this->Product->get($id) ) {
       $data['product'] = $query;
    }
    
    if ( $votes = $this->Vote->find($id) ) {
      $data['votes'] = $votes;
    }
    $data['js'] = 'products.js';
    $this->layout = 'admin';
    $this->load->view('products/admin_show', $data);
  }

  /*
  public function index($category = "") {
    $this->load->model('Product');
    $products = array();

    if ( $query = $this->Product->getProductId($id) ) {
      $products['records'] = $query;
    }

    $this->load->view('category/show', $products);
  }
  */

  public function admin_browse() {
    $this->load->model('Product');
    $data = array();

    if( $query = $this->Product->all() ) {
       $data['products'] = $query;
       $this->load->view('products/admin_browse', $data);
    } else {
      $this->load->view('error/404');
    }

    $this->layout = 'admin';
  }

  public function add() {
    $this->load->model('Category');
    $data = array();
    if ( $categories = $this->Category->all() ){
      $data['categories'] = $categories;
    }
    $this->layout = 'admin';
    $this->load->view('products/add',$data);
  }

  public function create(){
    $this->load->model('Product');

    $name = $this->input->post('product-name');
    $description = $this->input->post('product-description');
    $price = $this->input->post('product-price');
    $catID = $this->input->post('product-category');

    $this->Product->add($name,$description,$price,$catID);
    redirect( '/products/admin_show/'.$this->db->insert_id() );
  }

  public function edit($id) {
    $this->load->model('Product');
    $this->load->model('Category');
    $data = array();
    
    if ( $categories = $this->Category->all() ){
      $data['categories'] = $categories;
    }

    if ( $product = $this->Product->get($id) ) {
      $data['product'] = $product;
    }

    $this->layout = 'admin';
    $this->load->view('products/edit',$data);
  }

  public function update($id){
    $this->load->model('Product');

    $name = $this->input->post('product-name');
    $description = $this->input->post('product-description');
    $price = $this->input->post('product-price');
    $catID = $this->input->post('product-category');


    $this->Product->update($id,$name,$description,$price,$catID);
    redirect('/products/admin_show/'.$id);
  }


  public function search() {
    $this->load->view('products/search');
  }

  public function destroy($id){
    $this->load->model('Product');
    $this->Product->destroy($id);
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

  public function voteup ( $pid ) {
    $this->load->model('Vote');
    $this->layout = 'ajax';
    $user = current_user();

    if ( !$user ) {
      echo '{"status":"error","message":"not logged in"}';
    } elseif ($this->Vote->has_voted($user['uid'],$pid)) {
      echo '{"status":"error","message":"already voted"}';
    } else {
      $this->Vote->create($user['uid'],$pid,1);
      echo '{"status":"success"}';
    }
    
  }

  public function votedown ( $pid ) {
    $this->load->model('Vote');
    $this->layout = 'ajax';
    $user = current_user();

    if ( !$user ) {
      echo '{"status":"error","message":"not logged in"}';
    } elseif ($this->Vote->has_voted($user['uid'],$pid)) {
      echo '{"status":"error","message":"already voted"}';
    } else {
      $this->Vote->create($user['uid'],$pid,0);
      echo '{"status":"success"}';
    }
    
  }


}

?>
