<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

  public $layout = 'main';
  public $auth = array(
    'index' => array('message' => 'Sign up now to start shopping!', 'redirect' => '/customers/signup')
  );

  public function __construct()
  {
    parent::__construct();
  } 

  public function index() {
    $this->load->model('cartItems');
    //Get the logged in user's ID
    $user = current_user();

    $uid = $user['uid'];
    //Things for customer's cart
    $cart = $this->cartItems->get($uid);
    $data['size'] = count($cart);
    $data['cart'] = $this->cartItems->getDisplayArray($uid);
    $data['sum'] = $this->totalPrice($uid);
    
    $this->load->view('cart/show', $data);
  }

  function totalPrice($uid)
  {
    $totalPriceUSD = current($this->db->select("SUM(products.priceUSD)")->from("products")->join("stockitems", "products.pid = stockitems.pid")->join("cartitems", "cartitems.stockID = stockitems.stockID")->where("cartitems.uid", $uid)->where("didPurchase = 0")->get()->row_array());
    return $totalPriceUSD;
  }
  
  public function test_run() {
      $this->load->library('unit_test');
      $this->load->model('cartItems', 'item');
      
      $date1 = date( 'Y-m-d H:i:s',mktime(0,17,35,11,15,2011));
      //Run some tests against the Fixture Data.
      $this->unit->run($this->item->get(1), 'is_array', 'CartItems get() General Test', 'Make sure that get(1) returns an array.');
      $this->unit->run($this->item->get(1), array(array('uid' => 1, 'stockID' => 1, 'dateAdded' => $date1,'didPurchase' => 0)), 'CartItems get(1) Test', 'Make sure that the value of using get(1) returns the data we expect from the database.');
      $this->unit->run(current($this->item->getAll(100)), array('uid' => 1, 'stockID' => 1, 'dateAdded' => $date1,'didPurchase' => 0), 'Ordered Item all() test', 'Make sure that the value of using all() returns the data we expect from the database.');
      $this->unit->run($this->item->addItem(1,1), true, 'Cart Items addItem() General Test', 'Make sure that addItem() returns true and that it works for batches.');
      
      //Pass a report to the view
      $data['test_result'] = $this->unit->report();
      
      $this->load->view('test_runner', $data);
  } 
  
}

?>
