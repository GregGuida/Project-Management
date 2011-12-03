<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wish_Lists extends CI_Controller {
  public $layout = 'main';
  public $auth = array(
    'show' => array('message' => 'Sign up now to start shopping!', 'redirect' => '/customers/signup')
    );
    
    public function add() {
        $this->load->model('Wish_List_Item', 'item');
        $rules = array(
            array('field' => 'name', 'label' => 'Address', 'rules' => 'trim|required')
        );
        
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $new_wish_list_item = array(
                'uid' => get_current_user_stuff('uid'),
                'name' => $this->input->post('name')
            );
        }
    }
    
}