<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wish_List_Items extends CI_Controller {
  public $layout = 'main';
  public $auth = array(
    'create' => array(),
    'delete' => array()
    );
    
  public function create() {
      $this->load->model('Wish_List_Item', 'item');
      
      $form_data = array(
          'wishID' => $this->input->post('wish-id'),
          'pid' => $this->input->post('pid')
      );
      
      if($this->item->create($form_data) !== false) {
          set_message('Congratulations! You have added an item to you Wish List.', 'success');
          header('Location: /wish_lists/show/'.$form_data['wishID']);
      }
      else {
          set_message('Whoops! Something went wrong trying to add the item.', 'error');
          header('Location: /products/show/'.$form_data['pid']);
      }
  }
  
  public function delete() {
      $this->load->model('Wish_List_Item', 'item');
      
      if($this->item->delete($this->input->post('wishID'), $this->input->post('pid')) !== false) {
        if(!$this->input->post('ajax')) {
            set_message('Item removed from Wish List.', 'success');
            header('Location: /wish_lists/show/'.$this->input->post('wishID'));
        }
        else {
            $this->layout = 'ajax';
            echo json_encode(array("status" => "success", "message" => "Item removed from Wish List."));
        }
      }
      else {
        if(!$this->input->post('ajax')) {
            set_message('There was an error removing the item from your Wish List. Please try again.', 'error');
            header('Location: /wish_lists/show/'.$this->input->post('wishID'));
        }
        else {
            $this->layout = 'ajax';
            echo json_encode(array("status" => "error", "message" => "There was an error removing the item from your Wish List. Please try again."));
        }
      }
  }
}