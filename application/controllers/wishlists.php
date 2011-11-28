<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WishLists extends CI_Controller {
  public $layout = 'main';

  public function index() {
    $this->load->model('wishList');
    $this->load->helper('session');
    //Get the logged in user's ID
    $user = current_user();
    $uid = $user['uid'];  
  
    $this->load->view('wishlists/index');
  }
  
  public function show($wishID) {
    $this->load->model('wishList');
    $data = array();
    $user = current_user();
    $uid = $user['uid'];
    $wish = $this->wishList->getWishList($wishID);
    $wishName = $wish['name'];
    $list = $this->wishList->getDisplayArray($uid, $wishID);
    $data['list'] = $list;
    $data['wname'] = $wishName;
    $this->load->view('wishlists/show', $data);
  }
  
  public function test_run() {
      $this->load->library('unit_test');
      $this->load->model('WishList', 'item');
      
      $date1 = date('Y-m-d H:i:s',mktime(0,17,35,11,15,2011));
      //Run some tests against the Fixture Data.
      $this->unit->run($this->item->getWishList(1), 'is_array', 'Wish Lists get() General Test', 'Make sure that getWishList(1) returns an array.');
      $this->unit->run($this->item->getWishList(1), array('wishID' => 1, 'uid' => 1, 'name' => 'Test List',array('pid'=>1)), 'Wish Lists get() Test', 'Make sure that the value of using getWishList(1) returns the data we expect from the database.');
      $this->unit->run($this->item->addItemToList(2,1), true, 'Wish List addItem() General Test', 'Make sure that addItemToList() returns true.');
      $this->unit->run($this->item->removeItemFromList(2,1), true, 'Wish List removeItem() General Test', 'Make sure that removeItemFromList() returns true.');
      $this->unit->run($this->item->newWishList(1,'Second list'), true, 'New Wish List Test', 'Make sure that newWishList() returns true.');
      $this->unit->run($this->item->deleteWishList(2), true, 'Delete Wish List Test', 'Make sure deleteWishList() returns true.');
      
      //Pass a report to the view
      $data['test_result'] = $this->unit->report();
      
      $this->load->view('test_runner', $data);
  } 
  
}

?>
