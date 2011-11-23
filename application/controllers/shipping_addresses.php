<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipping_Addresses extends CI_Controller {
  public $layout = 'main';

  public function create() {
    $rules = array(
        array('field' => 'address_one', 'label' => 'Address', 'rules' => 'trim|required|alpha_numeric'),
        array('field' => 'city', 'label' => 'State', 'rules' => 'trim|required|alpha'),
        array('field' => 'state', 'label' => 'City', 'rules' => 'required|alpha'),
        array('field' => 'zip', 'label' => 'Zip', 'rules' => 'required|min_length[5]|max_length[5]')
    );
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) {
        set_message('Success! Your Shipping Address has been created.', 'error');
        header('Location: /orders/checkout');
    }
    else {
        set_message(validation_errors(), 'error');
        header('Location: /orders/checkout');
    }
  }
  
  public function destroy() {
      
  }
  
  public function is_street() {
      // \d+\s(\w+\s)+(Alley|Arcade|Arch|Avenue|Boardwalk|Boulevard|Bypass|Circle|Court|Cove|Cresent|Drive|Esplanade|Extension|Freeway|Green|Highway|Lane|Loop|Mall|Manor|Mews|Parkway|Path|Pike|Place|Plaza|Promenade|Road|Route|Spur|Square|Stravenue|Street|Terrace|Thruway|Trace|Trail|Turnpike|Viaduct|Walk|Way)
  }
}