<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wish_Lists extends CI_Controller {
  public $layout = 'main';
  public $auth = array(
    'show' => array('message' => 'Sign up now to start shopping!', 'redirect' => '/customers/signup'),
    'create' => array(),
    'delete' => array()
    );
  
  public function show($wishID) {
    $data = array();
    $this->load->model('Wish_List', "wishlist");

    $wishlist = $this->wishlist->find($wishID);

    if($wishlist && $wishlist['uid'] === get_current_user_stuff('uid')) {
        $data['list'] = $wishlist;
        $data['items'] = $this->wishlist->get_products_in_wishlist($wishID);
    }

    $this->load->view('wishlists/show', $data);
  }
  
  public function create() {
      $this->load->model('Wish_List', 'list');
      $rules = array(
          array('field' => 'name', 'label' => 'Name', 'rules' => 'trim|required')
      );
      
      $this->form_validation->set_rules($rules);

      if ($this->form_validation->run() == TRUE) {
          $new_wish_list = array(
              'uid' => get_current_user_stuff('uid'),
              'name' => $this->input->post('name')
          );
          
          $wish_id = $this->list->create($new_wish_list);
          
          if($wish_id != false) {
              if(!$this->input->post('ajax')) {
                  set_message('Success! Your Wish List has been created.', 'success');
                  header('Location: /customers/show/'.get_current_user_stuff('uid'));
              }
              else {
                  $this->layout = 'ajax';
                  echo json_encode(array("status" => "success", "message" => "Success! Your Wish List has been created.", "wish_id" => $wish_id));
              }
          }
          else {
              if(!$this->input->post('ajax')) {
                  set_message('There was an error adding your Wish List. Please try again.', 'error');
                  header('Location: /customers/show/'.get_current_user_stuff('uid'));
              }
              else {
                  $this->layout = 'ajax';
                  echo json_encode(array("status" => "error", "message" => "There was an error adding your Wish List. Please try again."));
              }
          }
      }
      else {
          if(!$this->input->post('ajax')) {
              set_message(validation_errors(), 'error');
              header('Location: /customers/show/'.get_current_user_stuff('uid'));
          }
          else {
              $this->layout = 'ajax';
              echo json_encode(array("status" => "error", "message" => validation_errors()));
          }
      }
  }
  
  public function delete($wish_id) {
      $this->load->model("Wish_List", "list");
      
      if($this->list->delete($wish_id)) {
          set_message('Success! Your Wish List has been deleted.', 'success');
          header('Location: /customers/show/'.get_current_user_stuff('uid'));
      }
      else {
          set_message('Something went wrong and your Wish List could not be deleted.', 'error');
          header('Location: /customers/show/'.get_current_user_stuff('uid'));
      }
  }
  
  
  
  /*
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
  */ 
}

?>
