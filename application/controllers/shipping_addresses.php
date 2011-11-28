<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipping_Addresses extends CI_Controller {
  public $layout = 'main';

  public function create() {
    $this->load->model('Shipping_Address', 'address');
    $rules = array(
        array('field' => 'address_one', 'label' => 'Address', 'rules' => 'trim|required|callback_is_street'),
        array('field' => 'city', 'label' => 'State', 'rules' => 'trim|required|alpha'),
        array('field' => 'state', 'label' => 'City', 'rules' => 'required|alpha'),
        array('field' => 'zip', 'label' => 'Zip', 'rules' => 'required|min_length[5]|max_length[5]')
    );
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == TRUE) {
        $new_address_data = array(
            'uid' => get_current_user_stuff('uid'),
            'Street' => $this->input->post('address_one'),
            'City' => $this->input->post('city'),
            'State' => $this->input->post('state'),
            'Zip' => $this->input->post('zip')
        );
        
        $address_id = $this->address->create($new_address_data);
        
        if($address_id != false) {
            if(!$this->input->post('ajax')) {
                set_message('Success! Your Shipping Address has been created.', 'success');
                header('Location: /orders/checkout');
            }
            else {
                $this->layout = 'ajax';
                echo json_encode(array("status" => "success", "message" => "Success! Your Shipping Address has been created.", "sid" => $address_id));
            }
        }
        else {
            if(!$this->input->post('ajax')) {
                set_message('There was an error adding your Shipping Address. Please try again.', 'error');
                header('Location: /orders/checkout');
            }
            else {
                $this->layout = 'ajax';
                echo json_encode(array("status" => "error", "message" => "There was an error adding your Shipping Address. Please try again."));
            }
        }
    }
    else {
        if(!$this->input->post('ajax')) {
            set_message(validation_errors(), 'error');
            header('Location: /orders/checkout');
        }
        else {
            $this->layout = 'ajax';
            echo json_encode(array("status" => "error", "message" => validation_errors()));
        }
    }
  }
  
  public function destroy() {
      
  }
  
  public function is_street($value)
    {
        $this->form_validation->set_message('is_street', 'The %s is not a valid street address. Please use full street suffix in address.');

        $regx = '/^\d+\s(\w+\s)+(Alley|Arcade|Arch|Avenue|Boardwalk|Boulevard|Bypass|Circle|Court|Cove|Cresent|Drive|Esplanade|Extension|Freeway|Green|Highway|Lane|Loop|Mall|Manor|Mews|Parkway|Path|Pike|Place|Plaza|Promenade|Road|Route|Spur|Square|Stravenue|Street|Terrace|Thruway|Trace|Trail|Turnpike|Viaduct|Walk|Way)$/';
        if(preg_match($regx, $value))
            return true;
        return false;
    }
}